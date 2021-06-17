<?php

use Illuminate\Support\Facades\Route;

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
    return view('PUmountain/PUmountain');
});
Route::get('PUpicture', function () {
    return view('PUmountain/PUpicture');
});


Route::get('/login', 'App\Http\Controllers\UserAuth@login');
Route::get('/logout', 'App\Http\Controllers\UserAuth@logout');

Route::get('/register', 'App\Http\Controllers\UserAuth@register');

Route::get('/profile', 'App\Http\Controllers\UserAuth@profile');


Route::post('/store', 'App\Http\Controllers\UserAuth@store');

Route::post('/logs', 'App\Http\Controllers\UserAuth@logs');

Route::post('/change_nickname', 'App\Http\Controllers\UserAuth@change_nickname');

Route::post('/change_profilepicture', 'App\Http\Controllers\UserAuth@change_profilepicture');

Route::post('/change_password', 'App\Http\Controllers\UserAuth@change_password');




Route::get('/borrow/mat', 'App\Http\Controllers\tool@mat');
Route::get('/borrow/bag', 'App\Http\Controllers\tool@bag');
Route::get('/borrow/backpack', 'App\Http\Controllers\tool@backpack');
Route::get('/borrow/burner', 'App\Http\Controllers\tool@burner');
Route::get('/borrow/camp', 'App\Http\Controllers\tool@camp');
Route::get('/borrow/other', 'App\Http\Controllers\tool@other');
Route::post('/add-to-cart', 'App\Http\Controllers\tool@AddToCart');
Route::get('/borrow/cart', 'App\Http\Controllers\tool@cart');
Route::post('/cartprocess', 'App\Http\Controllers\tool@cartprocess');
Route::get('/borrow/removecart', 'App\Http\Controllers\tool@removecart');
Route::get('/borrowrule', 'App\Http\Controllers\tool@borrowrule');
Route::get('/checksend', 'App\Http\Controllers\tool@checksend');
Route::get('/carttodb', 'App\Http\Controllers\tool@carttodb');
Route::get('/myorder', 'App\Http\Controllers\tool@myorder');
Route::get('/sendpicview/{order_id}', 'App\Http\Controllers\tool@sendpicview');
Route::post('/sendpic/{order_id}', 'App\Http\Controllers\tool@sendpic');
Route::get('/sendreturnpicview/{order_id}', 'App\Http\Controllers\tool@sendreturnpicview');
Route::post('/returndb/{order_id}', 'App\Http\Controllers\tool@returndb');



Route::get('/admin', 'App\Http\Controllers\PUadminset@admin');
Route::get('/admin/member', 'App\Http\Controllers\PUadminset@member');
Route::get('/admin/changetoadmin/{id}', 'App\Http\Controllers\PUadminset@changetoadmin');
Route::get('/admin/equipment', 'App\Http\Controllers\PUadminset@equipment');
Route::post('/admin/change_equipment', 'App\Http\Controllers\PUadminset@change_equipment');
Route::get('/admin/addnewitem', 'App\Http\Controllers\PUadminset@addnewitem');
Route::post('/admin/updatenewitem', 'App\Http\Controllers\PUadminset@updatenewitem');

Route::get('/admin/adminreturn/{order_id}', 'App\Http\Controllers\PUadminset@adminreturn');


Route::get('/admin/allorder/all', 'App\Http\Controllers\PUadminset@all');
Route::get('/admin/allorder/waitoget', 'App\Http\Controllers\PUadminset@waitoget');
Route::get('/admin/allorder/borrowing', 'App\Http\Controllers\PUadminset@borrowing');
Route::get('/admin/allorder/done', 'App\Http\Controllers\PUadminset@done');





