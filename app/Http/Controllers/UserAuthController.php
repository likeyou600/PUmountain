<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Session,Cart,Image,Validator; 
use App\Models\User;
use App\Models\item;
use App\Models\ordertab_infor;
use App\Models\ordertab_items;
use Illuminate\Support\Facades\Auth;
class UserAuthController extends Controller
{
    public function store(request $request){
        $rules = [
            'nickname'=> 'required|max:8',
            'account'=> 'required|alpha_num|unique:user,user_account|max:16',
            'contactEmail'=> 'required|email|max:64',
            'contactLINE'=> 'required|',
        ];
        $messages = [
            'nickname.max'=>'名子超出長度',
            'account.max'=>'帳號超出長度',
            'contactEmail.max'=>'信箱超出長度',
            'required' => '請完整輸入內容~',
            'alpha_num' => '只能英文數字哦~',
            'email' => '信箱格式錯誤!',
            'account.unique' =>'帳號已被使用過!'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
        return back()->withInput()->withErrors($validator);
        }

        else{
            $str = "abcdefghjkmnpqrstuvwxyz23456789";
            $password = substr(str_shuffle($str), 0, 6);
    
           
                user::create([
                'user_nickname'=>$request->nickname,
                'user_account'=>$request->account,
                'user_password'=>$password,
                'user_contactEmail'=>$request->contactEmail,
                'user_contactLine'=>$request->contactLINE,
            ]
            );
            return redirect('login')->with('message','註冊成功');
        }        
    }
    public function register(){
        if(session()->has('username')){
            return redirect('profile');
        }
        else{
            return view('PURegister');
        }
    }



    public function logs(request $request){
      
        $rules = [
            'account'=> 'required|alpha_num',
            'password'=> 'required|alpha_num',
        ];
        $messages = [
            'required' => '請完整輸入內容~',
            'alpha_num' => '只能英文數字哦~',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
        return back()->withInput()->withErrors($validator);
        }
        else{

            $user = user::where([
                'user_account' => $request->account, 
                'user_password' => $request->password
            ])->first();
            
            if($user)
            {
            Auth::login($user);
            
            $user = Auth::user();
            // dd(Auth::user());
            // $request->session()->regenerate();
            // session()->put('test',$user); 
            return redirect('profile');
            }
            else{
                return redirect('login')->with('message','帳密錯了哦');   
            }
        }
        // session()->put('userid',$id);
        // session()->put('account',$account);
        // session()->put('username',$nickname);
        // session()->put('password',$password);
        // session()->put('Email',$contactEmail);
        // session()->put('admin',$admin);
 
    }

 
    public function login(){
        // dd(Auth::user());
        return view('PULogin');
        
    }

 
    
    public function profile(request $request){

        // dd(Auth::user());
        // $value = $request->session()->get('test');

        if (Auth::user()) {
            return view('PUuserprofile');
        }
        
        else{
        return redirect('login');
        }
    }

    public function logout(){
        if(session()->has('username')){
            session()->pull('username');
            session()->pull('userid');
            session()->pull('userpicture');
            session()->pull('account');
            session()->pull('Email');
            session()->pull('admin');
        }

        return redirect('PUmountain')->with('logout_check','1');
        }
    


    

        public function change_nickname(request $request){
            try{
            $newnickname=$request->input('nickname');
            if($newnickname){
           
            DB::update('update users set nickname=? where id=?', [$newnickname,Session::get('userid')]);
            session()->put('username',$newnickname);
            return redirect('profile')->with('userprofile','名稱修改成功~');}

            else{
                return redirect('profile')->with('userprofile','要記得輸入新名稱!'); 
            }
        }
            catch (\Illuminate\Database\QueryException $e){
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1406){
                    return redirect('profile')->with('userprofile','最多8個中英文混合!'); 
                }
            }
        
    }

        public function change_profilepicture(request $request){
        
            
            if($request->hasFile('profilepicture')){
            $newpicture = $request->file('profilepicture');
            $filename = time(). '.' . $newpicture->getClientOriginalExtension();
            session()->put('userpicture',$filename);
            Image::make($newpicture)->resize(300,300)->save( public_path('/uploads/PUmountain/userpic/'.$filename));
            DB::update('update users set picture=? where id=?', [$filename,Session::get('userid')]);
            return redirect('profile')->with('userprofile','頭貼修改成功~');}

            else{
                return redirect('profile')->with('userprofile','要記得放要換的頭貼!'); 
            }
        }

        public function change_password(request $request){
            $old=$request->oldpassword;
            $new=$request->newpassword;
            $check=$request->checkpassword;
            if($old && $new && $check){
            $password=Session::get('password');
            if($old==$password){
                if($new==$check){
                    
            DB::update('update users set password=? where account=?', [$new,Session::get('account')]);
            session()->put('password',$new);
            return redirect('profile')->with('userprofile','密碼修改成功~');}
            else{
                return redirect('profile')->with('userprofile','新密碼確認錯誤!'); 
            }
        
        }
            
            else{
                return redirect('profile')->with('userprofile','舊密碼輸入錯誤!'); 
            }
        }else{
            return redirect('profile')->with('userprofile','請輸入資料!'); 
        }
        }
        
       
}

        