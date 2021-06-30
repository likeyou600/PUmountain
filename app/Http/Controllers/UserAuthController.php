<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Session,Cart,Image,Validator,File,Auth; 
use App\Models\User;
use App\Models\OrdertabInfor;
use App\Models\Item;
use App\Models\OrdertabItem;
class UserAuthController extends Controller
{   
    //註冊
    public function store(request $request){
        $validated = $request->validate([
            'nickname'=> 'required|max:8',
            'account'=> 'required|alpha_num|unique:users,user_account|max:16',
            'contactEmail'=> 'required|email|max:64',
            'contactLINE'=> 'required|',
        ]);
        $str = "abcdefghjkmnpqrstuvwxyz23456789";
        $password = substr(str_shuffle($str), 0, 6);
        $user = new User();        
        $user->user_nickname=$validated['nickname'];
        $user->user_account=$validated['account'];
        $user->user_password=$password;
        $user->user_contactEmail=$validated['contactEmail'];
        $user->user_contactLine=$validated['contactLINE'];
        $saved = $user->save();
        if ($saved){
            return redirect('login')->with('message','註冊成功');
        }               
    }

    public function register(){
        if (Auth::user()) {
            return redirect('profile');
        }
        else{
            return view('PURegister');
        }
    }
    //註冊

    //登入
    public function logs(request $request){
        $user = User::where([
            'user_account' => $request->account, 
            'user_password' => $request->password
        ])->first();
        
        if($user){
            Auth::login($user);
            $user = Auth::user();
            $request->session()->regenerate();
            return redirect('profile')->with('message',"歡迎{$user->user_nickname}登入");
        }
        else{
            return redirect('login')->with('message','帳密錯了哦');   
        }
    }

    public function login(){
        if (Auth::user()) {
            return redirect('profile');
        }
        else{
            return view('PULogin');
        }
    }
    //登入

    //登出
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('PUmountain')->with('message','登出成功~');
    }
    //登出
 
    //個人檔案
    public function profile(){
        if (Auth::user()) {
            return view('PUuserprofile');
        }
        else{
            return redirect('login');
        }
    }
    //個人檔案

    //修改名稱
    public function change_nickname(request $request){
        $validated = $request->validate([
            'newnickname'=> 'required|max:8',
        ]);
        User::where('id',Auth::user()->id)->update(['user_nickname'=>$validated['newnickname']]);
        return redirect('profile')->with('message','名稱修改成功~');
    }
    //修改名稱

    //修改頭貼
    public function change_picture(request $request){
        $validated = $request->validate([
            'profilepicture'=> 'required|file',
        ]);
        $newpicture=$validated['profilepicture'];
        $filename = Auth::user()->user_account.'_picture.'. $newpicture->getClientOriginalExtension();
        if(Auth::user()->user_picture!='default.jpg'){
            File::delete(Auth::user()->user_picture);
        }
        Image::make($newpicture)->resize(300,300)->save(public_path('/uploads/userpic/'.$filename));
        User::where('id',Auth::user()->id)->update(['user_picture'=>$filename]);
        return redirect('profile')->with('message','頭貼修改成功~請重新登入!');
    }
    //修改頭貼

    //修改密碼
    public function change_password(request $request){
        $validated = $request->validate([
            'oldpassword'=> 'required|max:32',
            'password'=> 'required|max:32|confirmed',
        ]);
        if(Auth::user()->user_password!=$validated['oldpassword']){
            return redirect('profile')->with('message','舊密碼輸入錯誤!'); 
        }
        User::where('id',Auth::user()->id)->update(['user_password'=>$validated['password']]);
        return redirect('profile')->with('message','密碼修改成功~');
    }
    //修改密碼
}

        