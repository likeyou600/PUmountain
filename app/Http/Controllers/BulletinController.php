<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bulletin;

class BulletinController extends Controller
{
    //使用者查看所有公告
    public function bulletinall()
    {
        $bulletins = Bulletin::all()->sortByDesc('id');
        return view('PUbulletin', compact("bulletins"));
    }
    //使用者查看所有公告

    //公告詳細內文
    public function bulletindetail($id)
    {
        $bulletin = Bulletin::find($id);
        $poster = User::find($bulletin->user_id)->nickname;
        return view('PUbulletindetail', compact("bulletin", "poster"));
    }
    //公告詳細內文


    //admin
    //  |
    //  |
    //  V

    //管理貼文
    public function manager()
    {
        $bulletins = Bulletin::all();
        return view('admin/bulletin/PUbulletinManager', compact("bulletins"));
    }
    //管理貼文

    //編輯器
    public function editckedit(Request $request)
    {
        $bulletin = Bulletin::find($request->id);
        return view('admin/bulletin/PUeditckedit', compact("bulletin"));
    }
    //編輯器

    //發布貼文
    public function createpost(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $title = $validated['title'];
        $content = $validated['content'];

        $Bulletin = new Bulletin();
        $Bulletin->title = $title;
        $Bulletin->content = $content;
        $Bulletin->user_id = Auth::user()->id;
        $Bulletin->save();
        return redirect('admin/bulletin/manager')->with('message', '發布成功');
    }
    //發布貼文

    //修改貼文
    public function editpost(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        if ($title == '' || $content == '') {
            return redirect('admin/bulletin/manager')->with('message', '請完善修改資料');
        }
        Bulletin::find($request->input('id'))->update(['title' => $title, 'content' => $content]);
        return redirect('admin/bulletin/manager')->with('message', '修改成功');
    }
    //修改貼文

    //刪除貼文
    public function deletepost(Request $request)
    {
        $id = $request->input('deletebulletinid');
        Bulletin::find($id)->delete();
        return back()->with('message', '刪除成功');
    }
    //刪除貼文
}
