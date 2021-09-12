<?php

namespace App\Http\Controllers;

use App\Mail\Returned;
use App\Mail\Using;
use App\Mail\Waitoget;
use Illuminate\Http\Request;
use App\Helpers\General\CollectionHelper;

use DB, Cart, Mail, Auth, Image, File;

use App\Models\User;
use App\Models\Category;
use App\Models\Order;
use App\Models\Item;
use App\Models\OrderDetail;
use App\Models\Regulation;
use App\Models\PhotoYear;

class ToolController extends Controller
{
    // public function showmail()
    // {
    //     return view('mail.cancle');
    // }
    // public function sendmail()
    // {
    //     $User = Auth::user();
   
    //     dd(123);
    // }

    //活動照片
    public function PUpicture($year)
    {
        $years = PhotoYear::all();
        $items = PhotoYear::where('year', $year)->first()->activityphotos;
        return view("PUpicture", compact('years', 'items'));
    }
    //活動照片

    //借用規則
    public function rule()
    {
        $rules = Regulation::all();
        return view("borrow/rule", compact('rules'));
    }
    //借用規則

    //物品介面
    public function article($category)
    {
        $items = Category::where('category', $category)->first()->items;
        return view("borrow/article/show", compact('items', 'category'));
    }
    //物品介面

    //新增到購物車
    public function AddToCart(Request $request)
    {
        $item_id = $request->input('id');
        $select_quantity = $request->input('select_quantity');
        // $category = Item::find($id)->category()->first()->category 透過model取
        $item_category = $request->input('category');
        if ($request->select_quantity != 0) {
            \Cart::session(Auth::user()->id)->add([
                'id' => $item_id,
                'name' => $item_category . "_" . $item_id,
                'price' => 0,
                'quantity' => $select_quantity,
                'attributes' => [
                    'category' => $item_category,
                ]
            ]);
            return redirect("borrow/selectpage/$item_category")->with('message', '添加成功!');
        } else {
            return redirect("borrow/selectpage/$item_category")->with('message', '請選擇數量~');
        }
    }
    //新增到購物車

    //購物車界面
    public function CartView(Request $request)
    {
        $carts = Cart::session(Auth::user()->id)->getContent();
        return view('borrow/cart', compact('carts'));
    }
    //購物車界面

    //更改數量
    public function UpdateCart(Request $request)
    {
        $User = Auth::user();
        $item_id = $request->input('id');
        $new_quantity = $request->input('select');
        $item_category = $request->input('category');
        if (isset($_POST['update_button'])) {
            \Cart::session($User->id)->add(array(
                'id' => $item_id,
                'name' => $item_category . "_" . $item_id,
                'price' => 0,
                'quantity' => $new_quantity,
                'attributes' => array(
                    'category' => $item_category,
                )
            ));
            return redirect("borrow/cart")->with('message', '更改數量成功!');
        } else if (isset($_POST['delete_button'])) {
            \Cart::session($User->id)->remove($item_id);
            return redirect("borrow/cart")->with('message', '刪除成功!');
        }
    }
    //更改數量

    //清空借物車
    public function RemoveCart()
    {
        Cart::session(Auth::user()->id)->clear();
        return redirect("borrow/cart")->with('message', '清除成功!');
    }
    //清空借物車

    //最後確認介面
    public function checksend()
    {
        $carts = Cart::session(Auth::user()->id)->getContent();
        return view('borrow/checksend', compact('carts'));
    }
    //最後確認介面

    //存入資料庫
    public function cartstore()
    {
        $User = Auth::user();
        $User->increment('borrowtime');
        //User hasMany OrdertabInfor
        $Order = new Order();
        $User->orders()->save($Order);

        $items = Cart::session($User->id)->getContent();
        foreach ($items as $item) {
            $item_id = $item->id;
            $quantity = $item->quantity;

            $OrderDetail = new OrderDetail(); //要存入的資料表
            $OrderDetail->order_id = $Order->id;
            $OrderDetail->item_id = $item_id;
            $OrderDetail->quantity = $quantity;
            $OrderDetail->save();
            Item::find($item_id)->decrement('quantity', $quantity);
        }
        Cart::session($User->id)->clear();

        //寄信
        $order_details = $User->orders->where('status', 2)->sortByDesc('id')->first()->order_details;
        Mail::to($User->contact_email)->send(new Waitoget($order_details));
        //寄信

        return redirect("borrow/myorder/waitoget")->with('message', '申請成功!');
    }
    //存入資料庫

    //個人檢視頁面
    public function myorder($status)
    {
        $User = Auth::user();
        if ($status == 'all') {
            $orders = $User->orders->sortByDesc('id');
        } else if ($status == 'waitoget') {
            $orders = $User->orders->where('status', 2)->sortByDesc('id');
        } else if ($status == 'using') {
            $orders = $User->orders->where('status', 1)->sortByDesc('id');
        } else if ($status == 'returned') {
            $orders = $User->orders->where('status', 0)->sortByDesc('id');
        } else if ($status == 'cancle') {
            $orders = $User->orders->where('status', 99)->sortByDesc('id');
        }
        $orders = CollectionHelper::paginate($orders, 3);
        return view('borrow/myorder/page', compact('orders'));
    }
    //個人檢視頁面

    //傳送借用照片
    public function sendpicview(request $request)
    {
        $order_id = $request->input('order_id');
        return view('borrow/sendpic', compact('order_id'))->with('message', '請上傳借用器材照片~');
    }

    public function sendpic(request $request)
    {
        $User = Auth::user();
        $picture = $request->file('pic');
        if ($picture == '') {
            return redirect('borrow/myorder/waitoget')->with('message', '借用失敗，請記得上傳借用照片~');
        }
        $picmime = $picture->getMimeType();
        if ($picmime == 'image/heif') {
            return redirect('borrow/myorder/waitoget')->with('message', '借用失敗，請從相簿選擇圖片上傳');
        }
        $order_id = $request->input('order_id');

        $filename = $order_id . "_out." . $picture->getClientOriginalExtension();
        Order::find($order_id)->update(['pic_borrow' => $filename]);

        Image::make($picture)->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(public_path('/uploads/order_out/' . $filename));
        $getDate = date("Y-m-d");
        $order_lastreturndate = date("Y-m-d", strtotime('+ 14day'));
        Order::find($order_id)->update(['borrow_date' => $getDate, 'last_return_date' => $order_lastreturndate, 'status' => 1]);

        //寄信
        $order = $User->orders->where('status', 1)->sortByDesc('id')->first();
        $order_details = $User->orders->where('status', 1)->sortByDesc('id')->first()->order_details;
        Mail::to($User->contact_email)->send(new Using($order, $order_details));
        //寄信

        return redirect("borrow/myorder/using")->with('message', '借用成功!');
    }
    //傳送借用照片

    //傳送歸還照片
    public function sendreturnpicview(request $request)
    {
        $order_id = $request->input('order_id');
        return view('borrow/returnpic', compact('order_id'));
    }

    public function sendreturnpic(request $request)
    {   
        $User = Auth::user();
        $picture =  $request->file('pic');
        if ($picture == '') {
            return redirect('borrow/myorder/using')->with('message', '歸還失敗，記得上傳歸還照片哦~');
        }
        $picmime = $picture->getMimeType();
        if ($picmime == 'image/heif') {
            return redirect('borrow/myorder/using')->with('message', '借用失敗，請從相簿選擇圖片上傳');
        }
        $order_id = $request->input('order_id');

        $filename = $order_id . "_in." . $picture->getClientOriginalExtension();
        Order::find($order_id)->update(['pic_return' => $filename]);

        Image::make($picture)->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(public_path('/uploads/order_in/' . $filename));
        // dd(123);
        $getDate = date("Y-m-d");

        $order_details = Order::find($order_id)->order_details;
        foreach ($order_details as $order_detail) {
            Item::find($order_detail->item_id)->increment('quantity', $order_detail->quantity);
        };
        Order::find($order_id)->update(['return_date' => $getDate, 'status' => 0]);

        //寄信
        $order = $User->orders->where('status', 0)->sortByDesc('id')->first();
        $order_details = $User->orders->where('status', 0)->sortByDesc('id')->first()->order_details;
        Mail::to($User->contact_email)->send(new Returned($order, $order_details));
        //寄信

        return redirect("borrow/myorder/returned")->with('message', '歸還成功!');
    }
    //傳送歸還照片

};
