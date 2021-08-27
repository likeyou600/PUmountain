<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth, Image, File;
use App\Models\User;


class UserAuthController extends Controller
{
    //註冊
    public function store(request $request)
    {
        $validated = $request->validate([
            'nickname' => 'required|max:8',
            'account' => 'required|alpha_num|unique:users,account|max:16',
            'contact_email' => 'required|email|max:64',
            'contact_line' => 'required|max:32',
        ]);
        $str = "abcdefghjkmnpqrstuvwxyz23456789";
        $password = substr(str_shuffle($str), 0, 6);
        $user = new User();
        $user->nickname = $validated['nickname'];
        $user->account = $validated['account'];
        $user->password = $password;
        $user->contact_email = $validated['contact_email'];
        $user->contact_line = $validated['contact_line'];
        $saved = $user->save();
        if ($saved) {
            return redirect('login')->with('message', '註冊成功');
        }
    }
    //註冊

    //登入
    public function logs(request $request)
    {
        $user = User::where([
            'account' => $request->account,
            'password' => $request->password
        ])->first();

        if ($user) {
            Auth::login($user);
            $User = Auth::user();
            $request->session()->regenerate();
            return redirect('profile')->with('message', "歡迎{$User->nickname}登入");
        } else {
            return redirect('login')->with('message', '帳密錯了哦');
        }
    }
    //登入

    //登出
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', '登出成功~');
    }
    //登出

    //修改名稱
    public function change_nickname(request $request)
    {
        $validated = $request->validate([
            'newnickname' => 'required|max:8',
        ]);
        User::where('id', Auth::user()->id)->update(['nickname' => $validated['newnickname']]);
        return redirect('profile')->with('message', '名稱修改成功~');
    }
    //修改名稱

    //修改頭貼
    public function change_picture(request $request)
    {
        $User = Auth::user();
        $validated = $request->validate([
            'usernewpic' => 'required|file',
        ]);
        $newpicture = $validated['usernewpic'];
        $picmime = $newpicture->getMimeType();
        if ($picmime == 'image/heif') {
            return redirect('profile')->with('message', '更改失敗，請從相簿選擇圖片上傳');
        }
        $filename = $User->account . '_picture.' . $newpicture->getClientOriginalExtension();
        if ($User->picture != 'default.jpg') {
            File::delete($User->picture);
        }
        Image::make($newpicture)->resize(300, 300)->save(public_path('/uploads/userpic/' . $filename));
        $User->update(['picture' => $filename]);
        return redirect('profile')->with('message', '頭貼修改成功~請重新登入!');
    }
    //修改頭貼

    //修改密碼
    public function change_password(request $request)
    {
        $User = Auth::user();
        $validated = $request->validate([
            'oldpassword' => 'required|max:32',
            'password' => 'required|max:32|confirmed',
        ]);
        if ($User->password != $validated['oldpassword']) {
            return redirect('profile')->with('message', '舊密碼輸入錯誤!');
        }
        $User->update(['password' => $validated['password']]);
        return redirect('profile')->with('message', '密碼修改成功~');
    }
    //修改密碼

}
