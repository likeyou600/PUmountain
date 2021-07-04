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



Route::view('PUmountain', 'PUmountain')->name('PUmountain');
Route::view('PUpicture', 'PUpicture')->name('PUpicture');


Route::view('register', 'PURegister')->name('register')->middleware('auth.backtoprofile');
Route::view('login', 'PULogin')->name('login')->middleware('auth.backtoprofile');
Route::view('profile', 'PUuserprofile')->name('profile')->middleware('auth.check');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('register', [UserAuthController::class, 'store'])->name('register');
    Route::post('login', [UserAuthController::class, 'logs'])->name('login');
    Route::get('logout', [UserAuthController::class, 'logout'])->name('logout')->middleware('auth.check');
    Route::post('change_nickname', [UserAuthController::class, 'change_nickname'])->name('change_nickname');
    Route::post('change_picture', [UserAuthController::class, 'change_picture'])->name('change_picture');
    Route::post('change_password', [UserAuthController::class, 'change_password'])->name('change_password');
});


Route::prefix('borrow')->middleware('auth.check')->name('borrow.')->group(function () {
    Route::get('sendmail', [ToolController::class, 'sendmail'])->name('sendmail');

    Route::get('selectpage/{category}', [ToolController::class, 'article'])->name('article');

    Route::post('addtocart', [ToolController::class, 'AddToCart'])->name('addtocart')->middleware('borrow.backtomyorder');
    Route::get('cart', [ToolController::class, 'CartView'])->name('cart');
    
    Route::group(['middleware' => 'borrow.backtocart'], function () {
        Route::post('updatecart', [ToolController::class, 'UpdateCart'])->name('updatecart');
        Route::get('removecart', [ToolController::class, 'RemoveCart'])->name('removecart');
        Route::get('rule', [ToolController::class, 'rule'])->name('rule');
        Route::get('checksend', [ToolController::class, 'checksend'])->name('checksend');
        Route::get('cartstore', [ToolController::class, 'cartstore'])->name('cartstore');
    });

    Route::get('myorder', [ToolController::class, 'myorder'])->name('myorder');
    Route::post('sendpicview', [ToolController::class, 'sendpicview'])->name('sendpicview');
    Route::post('sendpic', [ToolController::class, 'sendpic'])->name('sendpic');
    Route::post('sendreturnpicview', [ToolController::class, 'sendreturnpicview'])->name('sendreturnpicview');
    Route::post('sendreturnpic', [ToolController::class, 'sendreturnpic'])->name('sendreturnpic');
});


Route::get('/admin', [AdminController::class, 'admin']);
Route::get('/admin/member', [AdminController::class, 'member']);
Route::get('/admin/changetoadmin/{id}', [AdminController::class, 'changetoadmin']);
Route::get('/admin/equipment', [AdminController::class, 'equipment']);
Route::post('/admin/change_equipment', [AdminController::class, 'change_equipment']);
Route::get('/admin/addnewitem', [AdminController::class, 'addnewitem']);
Route::post('/admin/updatenewitem', [AdminController::class, 'updatenewitem']);

Route::get('/admin/adminreturn/{order_id}', [AdminController::class, 'adminreturn']);


Route::get('/admin/allorder/all', [AdminController::class, 'all']);
Route::get('/admin/allorder/waitoget', [AdminController::class, 'waitoget']);
Route::get('/admin/allorder/borrowing', [AdminController::class, 'borrowing']);
Route::get('/admin/allorder/done', [AdminController::class, 'done']);
