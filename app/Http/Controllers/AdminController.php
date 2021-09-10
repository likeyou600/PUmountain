<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Image, DB;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;
use App\Models\Item;
use App\Models\Prompter;
use App\Models\Regulation;
use App\Models\PhotoYear;
use App\Models\ActivityPhoto;

use App\Helpers\General\CollectionHelper;


class AdminController extends Controller
{
    //活動照片
    public function admin_picture($year)
    {   
        $years = PhotoYear::all();
        $items = PhotoYear::where('year', $year)->first()->activityphotos;
        return view("admin/picture/admin_picture", compact('years', 'items'));
    }
    public function addnewyear(Request $request)
    {   
        $PhotoYear = new PhotoYear();
        $PhotoYear->year=$request->input('newyear');
        $PhotoYear->save();
        return back()->with('message', "新增成功");
    }
    public function addnewlink(Request $request)
    {   
        if($request->input('year')=="0"){
            return back()->with('message', "請選擇學年度");
        }
        $ActivityPhoto = new ActivityPhoto();
        $ActivityPhoto->photo_year_id=$request->input('year');
        $ActivityPhoto->location=$request->input('name');
        $ActivityPhoto->site=$request->input('site');
        $ActivityPhoto->save();
        return back()->with('message', "新增成功");
    }
    public function deletelink(Request $request)
    {   
        if($request->input('deletesiteid')=='0'){
            return back()->with('message', "請選擇想刪除的");
        }
        ActivityPhoto::find($request->input('deletesiteid'))->delete();
        return back()->with('message', "刪除成功");
    }
    //活動照片

    //規則管理
    public function regulation()
    {
        $rules = Regulation::all();
        return view('admin/regulation/PUregulation', compact('rules'));
    }
    public function changerule(Request $request)
    {
        Regulation::find($request->input('ruleid'))->update(['rule' => $request->input('rulecontext')]);
        return back()->with('message', "調整成功");
    }
    public function addrule(Request $request)
    {
        $validated = $request->validate([
            'newrule' => 'required',
        ]);
        $rule = new Regulation();
        $rule->rule = $validated['newrule'];
        $saved = $rule->save();
        if ($saved) {
            return back()->with('message', '新增成功');
        }
    }
    public function deleterule(Request $request)
    {
        Regulation::find($request->input('deleteruleid'))->delete();
        return back()->with('message', "刪除成功");
    }
    //規則管理

    //跑馬燈管理
    public function prompters()
    {
        $prompters = Prompter::all();
        return view('admin/prompters/PUprompters', compact('prompters'));
    }
    public function changeprompters(Request $request)
    {
        $validated = $request->validate([
            'promptercontext' => 'required',
        ]);
        Prompter::find(1)->update(['content' => $validated['promptercontext']]);
        return back()->with('message', "調整成功");
    }
    //跑馬燈管理

    //社員管理
    public function member()
    {
        $users = User::paginate(5);
        return view('admin/member/PUmember', compact('users'));
    }
    public function promotion(Request $request)
    {
        User::where('id', $request->input('UpgradeAdminid'))->increment('is_admin');
        return back()->with('message', "調整成功");
    }
    //社員管理

    //器材管理
    public function equipment($category)
    {
        $items = Category::where('category', $category)->first()->items;
        return view('admin/equipment/PUequipment', compact('items', 'category'));
    }

    public function change_quantity(Request $request)
    {
        $id = $request->input('id');
        $new_quantity = $request->input('new_quantity');
        Item::find($id)->Update(['quantity' => $new_quantity]);
        return back()->with('message', "調整數量成功");
    }
    //器材管理

    //新增器材
    public function newequipment(Request $request)
    {
        $validated = $request->validate([
            'category' => 'numeric|min:1',
            'pic' => 'required|file',
            'select' => 'numeric|min:1'
        ]);
        $quantity = $validated['select'];
        $picture = $validated['pic'];
        $category_id = $validated['category'];
        $category = Category::find($category_id)->first()->category;

        $statement = DB::select("SHOW TABLE STATUS LIKE 'items'");
        $new_id = $statement[0]->Auto_increment;
        $filename = $category . "_$new_id." . $picture->getClientOriginalExtension();

        $item = new Item();
        $item->category_id = $category_id;
        $item->quantity = $quantity;
        $item->picture = $filename;
        $item->save();

        Image::make($picture)->resize(1000, 1000)->save(public_path("/picture/borrow/$category/" . $filename));

        return back()->with('message', '添加成功!');
    }
    //新增器材

    //刪除器材
    public function deleteequipment(Request $request)
    {
        $id = $request->input('deleteid');
        Item::find($id)->delete();
        return back()->with('message', '刪除成功');
    }
    //刪除器材

    //管理訂單
    public function allorder($status)
    {
        if ($status == 'all') {
            $orders = Order::all()->sortByDesc('id');
        } else if ($status == 'waitoget') {
            $orders = Order::where('status', 2)->get()->sortByDesc('id');
        } else if ($status == 'using') {
            $orders = Order::where('status', 1)->get()->sortByDesc('id');
        } else if ($status == 'returned') {
            $orders = Order::where('status', 0)->get()->sortByDesc('id');
        } else if ($status == 'cancle') {
            $orders = Order::where('status', 99)->get()->sortByDesc('id');
        }
        $orders = CollectionHelper::paginate($orders, 3);
        return view('admin/allorder/page', compact('orders'));
    }

    public function helpborrow(Request $request)
    {
        $picture = $request->file('admin_sendpic1');
        if ($picture == '') {
            return redirect('admin/allorder/waitoget')->with('message', '代傳失敗，請記得上傳照片~');
        }
        $order_id = $request->input('order_id');
        $mail = Order::find($order_id)->user()->first()->contact_email;
        $filename = $order_id . "_out." . $picture->getClientOriginalExtension();
        Order::find($order_id)->update(['pic_borrow' => $filename]);

        Image::make($picture)->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(public_path('/uploads/order_out/' . $filename));
        $getDate = date("Y-m-d");
        $order_lastreturndate = date("Y-m-d", strtotime('+ 14day'));
        Order::find($order_id)->update(['borrow_date' => $getDate, 'last_return_date' => $order_lastreturndate, 'status' => 1]);
        // Mail::to($mail)->send(new Using());
        return redirect('admin/allorder/using')->with('message', '代借用成功!');
    }
    public function helpcancle(Request $request)
    {
        $order_id = $request->input('cancle_orderid');

        $order_details = Order::find($order_id)->order_details;
        foreach ($order_details as $order_detail) {
            Item::find($order_detail->item_id)->increment('quantity', $order_detail->quantity);
        };
        Order::find($order_id)->update(['status' => 99]);

        return redirect('admin/allorder/cancle')->with('message', '管理取消成功');
    }

    public function helpreturn(Request $request)
    {
        $picture = $request->file('admin_returnpic2');
        // dd($picture);
        if ($picture == '') {
            return redirect('admin/allorder/using')->with('message', '代傳失敗，請記得上傳照片~');
        }
        $order_id = $request->input('return_order_id');
        $mail = Order::find($order_id)->user()->first()->contact_email;
        $filename = $order_id . "_in." . $picture->getClientOriginalExtension();
        Order::find($order_id)->update(['pic_return' => $filename]);

        Image::make($picture)->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(public_path('/uploads/order_in/' . $filename));
        $getDate = date("Y-m-d");

        $order_details = Order::find($order_id)->order_details;
        foreach ($order_details as $order_detail) {
            Item::find($order_detail->item_id)->increment('quantity', $order_detail->quantity);
        };
        Order::find($order_id)->update(['return_date' => $getDate, 'status' => 0]);
        // Mail::to($mail)->send(new Returned());
        return redirect('admin/allorder/returned')->with('message', '管理代歸還成功');
    }
}
