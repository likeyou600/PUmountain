<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\UserAuthController;

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



Route::view('PUmountain', 'PUmountain');
Route::view('PUpicture', 'PUpicture');


Route::get('register', [UserAuthController::class,'register']);
Route::get('login', [UserAuthController::class,'login']);
Route::get('logout', [UserAuthController::class,'logout']);
Route::get('profile', [UserAuthController::class,'profile']);

Route::prefix('auth')->name('auth.')->group(function () {

Route::post('register', [UserAuthController::class,'store'])->name('register');
Route::post('login', [UserAuthController::class,'logs'])->name('login');
Route::post('change_nickname', [UserAuthController::class,'change_nickname']);
Route::post('change_profilepicture', [UserAuthController::class,'change_profilepicture']);
Route::post('change_password', [UserAuthController::class,'change_password']);

});



Route::get('/borrow/mat',[ToolController::class,'mat']);
Route::get('/borrow/bag',[ToolController::class,'bag']);
Route::get('/borrow/backpack', [ToolController::class,'backpack']);
Route::get('/borrow/burner',[ToolController::class,'burner']);
Route::get('/borrow/camp',[ToolController::class,'camp']);
Route::get('/borrow/other',[ToolController::class,'other']);
Route::post('/add-to-cart', [ToolController::class,'AddToCart']);
Route::get('/borrow/cart',[ToolController::class,'cart']);
Route::post('/cartprocess', [ToolController::class,'cartprocess']);
Route::get('/borrow/removecart', [ToolController::class,'removecart']);
Route::get('/borrowrule', [ToolController::class,'borrowrule']);
Route::get('/checksend', [ToolController::class,'checksend']);
Route::get('/carttodb',[ToolController::class,'carttodb']);
Route::get('/myorder',[ToolController::class,'myorder']);
Route::get('/sendpicview/{order_id}',[ToolController::class,'sendpicview']);
Route::post('/sendpic/{order_id}',[ToolController::class,'sendpic']);
Route::get('/sendreturnpicview/{order_id}',[ToolController::class,'sendreturnpicview']);
Route::post('/returndb/{order_id}',[ToolController::class,'returndb']);



Route::get('/admin',[AdminController::class,'admin']);
Route::get('/admin/member',[AdminController::class,'member']);
Route::get('/admin/changetoadmin/{id}',[AdminController::class,'changetoadmin']);
Route::get('/admin/equipment',[AdminController::class,'equipment']);
Route::post('/admin/change_equipment',[AdminController::class,'change_equipment']);
Route::get('/admin/addnewitem',[AdminController::class,'addnewitem']);
Route::post('/admin/updatenewitem',[AdminController::class,'updatenewitem']);

Route::get('/admin/adminreturn/{order_id}', [AdminController::class,'adminreturn']);


Route::get('/admin/allorder/all',[AdminController::class,'all']);
Route::get('/admin/allorder/waitoget',[AdminController::class,'waitoget']);
Route::get('/admin/allorder/borrowing',[AdminController::class,'borrowing']);
Route::get('/admin/allorder/done',[AdminController::class,'done']);





