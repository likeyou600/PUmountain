<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use Session;
use Image;
class PUadminset extends Controller
{
    public function admin(){
        if(Session::get('admin')==1){
            return view('PUmountain/admin/PUadmin');
        }
        else{
            return redirect('PUmountain');
        }
    }
    public function member(){
        if(Session::get('admin')==1){
            $userdata=DB::table('users')->paginate(5);
            return view('PUmountain/admin/PUmember',compact('userdata'));
        }
        else{
            return redirect('PUmountain');
        }
    }
    public function changetoadmin($id){
        if(Session::get('admin')==1){
            DB::update('update users set admin = 1 where id = ?', [$id]);
            return redirect('admin/member')->with('message',"調整成功");
        }
        else{
            return redirect('PUmountain');
        }
    }
    public function equipment(){
        if(Session::get('admin')==1){
            $itemdata=DB::select('select * from items');
            return view('PUmountain/admin/PUequipment',compact('itemdata'));
        }
        else{
            return redirect('PUmountain');
        }
    }

    public function change_equipment(Request $request){
        if(Session::get('admin')==1){
            $id=$request->id;
            $new=$request->select;
            $category=$request->category;

            DB::update('update items set items_quantity=? where items_id=?', [$new,$id]);
            return redirect('admin/equipment')->with('message',"調整成功");
        }
        else{
            return redirect('PUmountain');
        }
    }

    public function all(){
        if(Session::get('admin')==1){
            $allorder=DB::select('select * from ordertab');
            $user_data=DB::table('ordertab')->orderBy('order_id','desc')->get();
            $user_countdata=DB::table('ordertab')->select('order_id', DB::raw('count(*) as user_borrowtime'))->groupBy('order_id')->orderBy('order_id','desc')->get();
            return view('PUmountain/admin/allorder/all',compact('user_data','user_countdata'));
        }
        else{
            return redirect('PUmountain');
        }
    }

    public function waitoget(){
        if(Session::get('admin')==1){
            $allorder=DB::select('select * from ordertab');
            $user_data=DB::table('ordertab')->orderBy('order_id','desc')->get();
            $user_countdata=DB::table('ordertab')->select('order_id', DB::raw('count(*) as user_borrowtime'))->groupBy('order_id')->orderBy('order_id','desc')->get();
            return view('PUmountain/admin/allorder/waitoget',compact('user_data','user_countdata'));
        }
        else{
            return redirect('PUmountain');
        }
    }

    public function borrowing(){
        if(Session::get('admin')==1){
            $allorder=DB::select('select * from ordertab');
            $user_data=DB::table('ordertab')->orderBy('order_id','desc')->get();
            $user_countdata=DB::table('ordertab')->select('order_id', DB::raw('count(*) as user_borrowtime'))->groupBy('order_id')->orderBy('order_id','desc')->get();
            return view('PUmountain/admin/allorder/borrowing',compact('user_data','user_countdata'));
        }
        else{
            return redirect('PUmountain');
        }
    }

    public function done(){
        if(Session::get('admin')==1){
            $allorder=DB::select('select * from ordertab');
            $user_data=DB::table('ordertab')->orderBy('order_id','desc')->get();
            $user_countdata=DB::table('ordertab')->select('order_id', DB::raw('count(*) as user_borrowtime'))->groupBy('order_id')->orderBy('order_id','desc')->get();
            return view('PUmountain/admin/allorder/done',compact('user_data','user_countdata'));
        }
        else{
            return redirect('PUmountain');
        }
    }

    public function adminreturn($order_id){
        
        
        $readyreturn=DB::select('select items_id , items_quantity from ordertab where order_id = ?', [$order_id]);
        $returnqur=count($readyreturn);
        for($i=0;$i<$returnqur;$i++){
            DB::update('update items set items_quantity = items_quantity + ? where items_id = ?', [$readyreturn[$i]->items_quantity,$readyreturn[$i]->items_id]);
        }
        DB::update("update ordertab set order_status = 99 where order_id = ?", [$order_id]);
        return redirect('admin/allorder/all')->with('message','刪除成功');
    }
    
    public function addnewitem(Request $request){
        if(Session::get('admin')==1){
            return view('PUmountain/admin/PUaddnewitem');
        }
        else{
            return redirect('PUmountain');
        }
    }

    public function updatenewitem(Request $request){
        if(Session::get('admin')==1){
            if($request->hasFile('newitempic')){
                if($request->newcategory!=1){
                $newqua=$request->select;
                $newcategory=$request->newcategory;
                $last_data=DB::select('select * from items ORDER BY items_id DESC LIMIT 0 , 1');
                $last=$last_data[0]->items_id;
                $newid=$last+1;
                $picture = $request->file('newitempic');
                $filename = $newcategory."_$newid.".$picture->getClientOriginalExtension();
                DB::insert('insert into items (items_category,items_quantity,items_picture) values (?,?,?)', [$newcategory,$newqua,$filename]);
                Image::make($picture)->resize(1000,1000)->save( public_path("/picture/PUmountain/borrow/$newcategory/".$filename));
                
                return redirect("admin/addnewitem")->with('message','添加成功!');
                }
                else{
                    return redirect("admin/addnewitem")->with('message','請選擇種類~');   
                }
            }
                else {
                    return redirect("admin/addnewitem")->with('message','請上傳圖片~');   
                }
        }
        else{
            return redirect('PUmountain');
        }
    }

}