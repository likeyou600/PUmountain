<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PUadminset;
use App\Http\Controllers\tool;
use App\Http\Controllers\UserAuth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('PUmountain', function () {
    return view('PUmountain');
});
Route::get('PUpicture', function () {
    return view('PUpicture');
});


Route::get('/login', [UserAuth::class,'login']);
Route::get('/logout', [UserAuth::class,'logout']);

Route::get('/register', [UserAuth::class,'register']);

Route::get('/profile', [UserAuth::class,'profile']);


Route::post('/store', [UserAuth::class,'store']);

Route::post('/logs', [UserAuth::class,'logs']);

Route::post('/change_nickname', [UserAuth::class,'change_nickname']);

Route::post('/change_profilepicture', [UserAuth::class,'change_profilepicture']);

Route::post('/change_password', [UserAuth::class,'change_password']);




Route::get('/borrow/mat',[tool::class,'mat']);
Route::get('/borrow/bag',[tool::class,'bag']);
Route::get('/borrow/backpack', [tool::class,'backpack']);
Route::get('/borrow/burner',[tool::class,'burner']);
Route::get('/borrow/camp',[tool::class,'camp']);
Route::get('/borrow/other',[tool::class,'other']);
Route::post('/add-to-cart', [tool::class,'AddToCart']);
Route::get('/borrow/cart',[tool::class,'cart']);
Route::post('/cartprocess', [tool::class,'cartprocess']);
Route::get('/borrow/removecart', [tool::class,'removecart']);
Route::get('/borrowrule', [tool::class,'borrowrule']);
Route::get('/checksend', [tool::class,'checksend']);
Route::get('/carttodb',[tool::class,'carttodb']);
Route::get('/myorder',[tool::class,'myorder']);
Route::get('/sendpicview/{order_id}',[tool::class,'sendpicview']);
Route::post('/sendpic/{order_id}',[tool::class,'sendpic']);
Route::get('/sendreturnpicview/{order_id}',[tool::class,'sendreturnpicview']);
Route::post('/returndb/{order_id}',[tool::class,'returndb']);



Route::get('/admin',[PUadminset::class,'admin']);
Route::get('/admin/member',[PUadminset::class,'member']);
Route::get('/admin/changetoadmin/{id}',[PUadminset::class,'changetoadmin']);
Route::get('/admin/equipment',[PUadminset::class,'equipment']);
Route::post('/admin/change_equipment',[PUadminset::class,'change_equipment']);
Route::get('/admin/addnewitem',[PUadminset::class,'addnewitem']);
Route::post('/admin/updatenewitem',[PUadminset::class,'updatenewitem']);

Route::get('/admin/adminreturn/{order_id}', [PUadminset::class,'adminreturn']);


Route::get('/admin/allorder/all',[PUadminset::class,'all']);
Route::get('/admin/allorder/waitoget',[PUadminset::class,'waitoget']);
Route::get('/admin/allorder/borrowing',[PUadminset::class,'borrowing']);
Route::get('/admin/allorder/done',[PUadminset::class,'done']);





