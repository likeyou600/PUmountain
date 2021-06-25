<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use Session;
use Cart;
use Image;
class tool extends Controller
{
    
        public function mat(){
            if(session()->has('username')){
                $borrow_mat=DB::select('select * from items where items_category=?', ['mat']);
                return view('PUmountain/borrow/mat',compact('borrow_mat'));
            }
            else{
            return redirect('login')->with('userloginpage','請先登入~');   
            }
        }

        public function bag(){
            if(session()->has('username')){
                $borrow_bag= DB::select('select * from items where items_category=?', ['bag']);
                return view('PUmountain/borrow/bag',compact('borrow_bag'));
            }
            else{
            return redirect('login')->with('userloginpage','請先登入~');   
            }
        }
        public function backpack(){
            if(session()->has('username')){
                $borrow_backpack= DB::select('select * from items where items_category=?', ['backpack']);
                return view('PUmountain/borrow/backpack',compact('borrow_backpack'));
            }
            else{
            return redirect('login')->with('userloginpage','請先登入~');   
            }
        }
        public function burner(){
            if(session()->has('username')){
                $borrow_burner= DB::select('select * from items where items_category=?', ['burner']);
                return view('PUmountain/borrow/burner',compact('borrow_burner'));
            }
            else{
            return redirect('login')->with('userloginpage','請先登入~');   
            }
        }
        public function camp(){
            if(session()->has('username')){
                $borrow_camp= DB::select('select * from items where items_category=?', ['camp']);
                return view('PUmountain/borrow/camp',compact('borrow_camp'));
            }
            else{
            return redirect('login')->with('userloginpage','請先登入~');   
            }
        }
        public function other(){
            if(session()->has('username')){
                $borrow_other= DB::select('select * from items where items_category=?', ['other']);
                return view('PUmountain/borrow/other',compact('borrow_other'));
            }
            else{
            return redirect('login')->with('userloginpage','請先登入~');   
            }
        }
        
        public function AddToCart(Request $request){
            $id=$request->id;
            $select=$request->select;
            $category=$request->category;
            $userid=Session::get('userid');
            
            if($request->select){
                   \Cart::session($userid)->add(array(
                    'id' => $id,
                    'name' => $category."_".$id,
                    'price'=>0,
                    'quantity' =>$select,
                    'attributes' => array(
                      'category' =>$category,
                    )));
                return redirect("borrow/$category")->with('selectmessage','添加成功!');
        }
            else{
                return redirect("borrow/$category")->with('selectmessage','請選擇數量~');
            }
            
        }

        public function cart(){
            if(session()->has('username')){
            return view('PUmountain/borrow/PUcart');}
            else{
                return redirect('login')->with('userloginpage','請先登入~');   
                }
        }

        public function cartprocess(Request $request){
            if(session()->has('username')){
            $id=$request->id;
            $new=$request->select;
            $category=$request->category;
            $userid=Session::get('userid');
            if (isset($_POST['update_button'])) {
                \Cart::session($userid)->add(array(
                    'id' => $id,
                    'name' => $category."_".$id,
                    'price'=>0,
                    'quantity' =>$new,
                    'attributes' => array(
                      'category' =>$category,
                    )));
                return redirect("borrow/cart")->with('message','更改數量成功!');
            } else if (isset($_POST['delete_button'])) {

                \Cart::session($userid)->remove($id);
                return redirect("borrow/cart")->with('message','刪除成功!');
            }
        }
        else{
            return redirect('login')->with('userloginpage','請先登入~');   
            }
        }

        public function borrowrule(){
            if(session()->has('username')){
                return view('PUmountain/borrow/borrowrule');}
                else{
                    return redirect('login')->with('userloginpage','請先登入~');   
                    }
        }

        public function checksend(){
            if(session()->has('username')){
                return view('PUmountain/borrow/checksend');}
                else{
                    return redirect('login')->with('userloginpage','請先登入~');   
                    }
        }
        
        public function carttodb(){
            if(session()->has('username')){
            $account=Session::get('account');
            $user_order_status=0;
            $user_order_status_data=DB::select('select order_status from ordertab where user_account=?', [$account]);
            if($user_order_status_data){
            $user_order_status=$user_order_status_data[count($user_order_status_data)-1]->order_status;}
            if($user_order_status==1||$user_order_status==2){
                return redirect("borrow/cart")->with('message','還有未歸還的東西!');
            }
            else{
            $userid=Session::get('userid');
            $item=Cart::session($userid)->getContent();
            $borrow_time_data=DB::select('select user_borrowtime from ordertab where user_account=?', [$account]);
            
            if($borrow_time_data){
                $last_borrow_time = $borrow_time_data[count($borrow_time_data)-1]->user_borrowtime;
                $borrow_time=$last_borrow_time+1;
            }
            else{
                $borrow_time=1;
            }

            foreach($item as $row){
                $id=$row->id;
                $category=$row->attributes->category;
                $quantity=$row->quantity;
                
                DB::insert('insert into ordertab (id,order_id,user_account,user_borrowtime,items_id,items_category,items_quantity,order_status) values (?,?,?,?,?,?,?,?)', [null,$account."_".$borrow_time,$account,$borrow_time,$id,$category,$quantity,2]);
                    $allquantity_data=DB::select('select items_quantity from items where items_id=?', [$id]);
                    $all = $allquantity_data[0]->items_quantity;
                    $fin=$all-$quantity;
                    DB::update('update items set items_quantity=? where items_id=?', [$fin,$id]);
            }
            Cart::session($userid)->clear();

            // $to = Session::get('Email');; //收件者
            // $subject = "器材領取通知"; //信件標題
            // $username=Session::get('username');
            // $msg = "嗨~"."$username"."\r\n"."你向登山社借了器材，請聯絡社長拿器材哦"."\r\n"."社長LINE:https://line.me/ti/p/X0XBiAnjFw";//信件內容
            // $headers = "From:靜宜大學登山社"; //寄件者
            // mail("$to", "$subject", "$msg", "$headers");
            return redirect("myorder")->with('myordermessage','申請成功!');
            }
        }else{
            return redirect('login')->with('userloginpage','請先登入~');   
            }

            }

        

        public function removecart(){
            if(session()->has('username')){
            $userid=Session::get('userid');
            Cart::session($userid)->clear();
            return redirect("borrow/cart")->with('message','清除成功!');
            }
            else{
                return redirect('login')->with('userloginpage','請先登入~');   
                }
        }

        public function myorder(){
            if(session()->has('username')){
            $account=Session::get('account');
            $user_data=DB::table('ordertab')->where('user_account',$account)->orderBy('order_id','desc')->get();
            $user_countdata=DB::table('ordertab')->where('user_account',$account)->select('order_id', DB::raw('count(*) as user_borrowtime'))->groupBy('order_id')->orderBy('order_id','desc')->get();

            return view('PUmountain/borrow/myorder',compact('user_data','user_countdata'));
            }
            else{
                return redirect('login')->with('userloginpage','請先登入~');   
                }
        }

        public function sendpicview($order_id){
            if(session()->has('username')){
                return view('PUmountain/borrow/sendpicview',compact('order_id'))->with('message','請上傳借用器材照片~');
}
                else{
                    return redirect('login')->with('userloginpage','請先登入~');   
                    }
        }


        public function sendpic(request $request,$order_id){
            if(session()->has('username')){
                if($request->hasFile('orderpic'))
                {
                $picture = $request->file('orderpic');
                $filename = $order_id."_out.".$picture->getClientOriginalExtension();
                DB::insert('insert into ordertab_pic (order_id,order_pic) values (?,?)', [$order_id,$filename]);
                Image::make($picture)->resize(400,300)->save( public_path('/uploads/PUmountain/order_out/'.$filename));
                date_default_timezone_set("Asia/Taipei");
                $getDate= date("Y-m-d");
                $order_last_return_date=date("Y-m-d",strtotime('+ 14day'));
                DB::update("update ordertab set order_status = 1 , order_date = '$getDate' , order_last_return_date = '$order_last_return_date' where order_id = ?", [$order_id]);


                // $to = Session::get('Email');; //收件者
                // $subject = "器材借用通知"; //信件標題
                // $username=Session::get('username');
                // $msg = "嗨~"."$username"."\r\n"."你向登山社領取了器材"."\r\n"."借用開始日為"."$getDate"."\r\n"."最慢歸還日為"."$order_last_return_date"."\r\n"."祝旅途愉快 !~~";//信件內容
                // $headers = "From:靜宜大學登山社"; //寄件者
                // mail("$to", "$subject", "$msg", "$headers");


                return redirect("myorder")->with('myordermessage','借用成功!');
            }
                else {
                    return redirect("sendpicview/$order_id")->with('message','請上傳圖片~');   
                }
}
                else{
                    return redirect('login')->with('userloginpage','請先登入~');   
                    }
        }

        public function sendreturnpicview($order_id){
            if(session()->has('username')){
                return view('PUmountain/borrow/sendreturnpicview',compact('order_id'))->with('message','請上傳要歸還器材照片~');
}
                else{
                    return redirect('login')->with('userloginpage','請先登入~');   
                    }
        }

        public function returndb(request $request,$order_id){
            if(session()->has('username')){
                if($request->hasFile('returnorderpic'))
                {
                $picture = $request->file('returnorderpic');
                $filename = $order_id."_in.".$picture->getClientOriginalExtension();
                DB::update('update ordertab_pic set order_returnpic = ? where order_id = ?', [$filename,$order_id]);
                Image::make($picture)->resize(400,300)->save( public_path('/uploads/PUmountain/order_in/'.$filename));
                date_default_timezone_set("Asia/Taipei");
                $getDate= date("Y-m-d");
                $readyreturn=DB::select('select items_id , items_quantity from ordertab where order_id = ?', [$order_id]);
                $returnqur=count($readyreturn);
                for($i=0;$i<$returnqur;$i++){
                    DB::update('update items set items_quantity = items_quantity + ? where items_id = ?', [$readyreturn[$i]->items_quantity,$readyreturn[$i]->items_id]);
                }
                
                DB::update("update ordertab set order_status = 0 , order_return_date = '$getDate' where order_id = ?", [$order_id]);

                // $to = Session::get('Email');; //收件者
                // $subject = "器材歸還確認"; //信件標題
                // $username=Session::get('username');
                // $msg = "嗨~"."$username"."\r\n"."你已向登山社歸還了器材"."\r\n"."感謝您~~!";//信件內容
                // $headers = "From:靜宜大學登山社"; //寄件者
                // mail("$to", "$subject", "$msg", "$headers");
                
                return redirect("myorder")->with('myordermessage','歸還成功!');;
}
                    else {
                        return redirect("sendpicview/$order_id")->with('message','請上傳圖片~');   
                    }
            }
                else{
                    return redirect('login')->with('userloginpage','請先登入~');   
                    }
        }

        
        
               

        
};

        