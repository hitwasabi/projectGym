<?php

use App\Http\Controllers\AdminCategory;
use App\Http\Controllers\ClientController;
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

Route::get('/', function () {
    return redirect('/client/home');
});

Route::get('home',function (){
    return view('site/home');
});



//Login
//giao dien dang nhap
Route::get('/login',[\App\Http\Controllers\LoginController::class,'viewLogin']);
//dang nhap
Route::post('/login',[\App\Http\Controllers\LoginController::class,'login']);
//dang xuat
Route::post('/logout',[\App\Http\Controllers\LoginController::class,'logout']);


//Register
//dang ky
Route::get('/register',[\App\Http\Controllers\RegisterController::class,'register']);
Route::post('/register',[\App\Http\Controllers\RegisterController::class,'storeaccount']);


//Admin
//xem san pham
Route::get('/admin/product/index',[\App\Http\Controllers\AdminController::class,'viewProduct']);
//xem cate
Route::get('/admin/category/index',[\App\Http\Controllers\AdminController::class,'viewCategory']);
//xem trang chu
Route::get('/admin/home',[\App\Http\Controllers\AdminController::class,'viewHome']);
//xem nguoi dung
Route::get('/admin/users/index',[\App\Http\Controllers\AdminController::class,'viewUser']);
//xem chi tiet order
Route::get('/admin/users/orderDetail',[\App\Http\Controllers\AdminController::class,'viewOrder']);
//xem order chua xu ly
Route::get('/admin/order/index',[\App\Http\Controllers\AdminController::class,'viewOrder']);
//xu ly order chua xu ly
Route::put('/admin/order/{order_id}/update',[\App\Http\Controllers\AdminController::class,'update']);
//xem order dang xu ly
Route::get('/admin/order/pending',[\App\Http\Controllers\AdminController::class,'pendingOrder']);
//xu ly order dang xu ly
Route::put('/admin/order/{order_id}/updateOrder',[\App\Http\Controllers\AdminController::class,'updateOrder']);
//huy don hang
Route::put('/admin/order/{order_id}/cancelOrder',[\App\Http\Controllers\AdminController::class,'cancelOrder']);
//xem order da xu ly
Route::get('/admin/order/finish',[\App\Http\Controllers\AdminController::class,'finishOrder']);
//xem order da huy
Route::get('/admin/order/cancel',[\App\Http\Controllers\AdminController::class,'cancel']);
//xem chi tiet order tai admin
Route::get('/admin/order/{order_id}/details',[\App\Http\Controllers\AdminController::class,'orderDetail']);

//Product
//tim kiem san pham
Route::get('/admin/product/search',[\App\Http\Controllers\AdminProductController::class,'search']);
//giao dien tao san pham moi
Route::get('/admin/product/add_product',[\App\Http\Controllers\AdminProductController::class,'create']);
//luu san pham
Route::post('/admin/product/add_product',[\App\Http\Controllers\AdminProductController::class,'store']);
//sua san pham
Route::get('/admin/product/{product_id}/edit',[\App\Http\Controllers\AdminProductController::class,'edit']);
//cap nhat san pham
Route::put('/admin/product/{product_id}/edit',[\App\Http\Controllers\AdminProductController::class,'update']);


//Category
//tim kiem cate
Route::get('/admin/category/search',[AdminCategory::class,'search']);
//giao dien tao cate moi
Route::get('/admin/category/add_category',[AdminCategory::class,'create']);
//luu cate
Route::post('/admin/category/add_category',[AdminCategory::class,'store']);
//giao dien sua cate
Route::get('/admin/category/{cate_id}/edit',[AdminCategory::class,'edit']);
//cap nhat cate
Route::put('/admin/category/{cate_id}/edit',[AdminCategory::class,'update']);
//xoa cate
Route::delete('/admin/category/{category}/delete',[AdminCategory::class,'destroy']);


//Client
Route::get('/client/home',[ClientController::class,'viewClient']);
Route::get('/client/info',[ClientController::class,'viewInfo']);
Route::get('/client/{id}/edit',[ClientController::class,'editInfo']);
Route::put('/client/{id}/edit',[ClientController::class,'update']);
Route::get('/client/clientOrder',[\App\Http\Controllers\OrderController::class,'clientOrder']);
Route::get('/client/{order_id}/details',[\App\Http\Controllers\ClientController::class,'orderDetail']);


//Cac trang danh muc ben Client
Route::get('/client/category/mass',[ClientController::class,'viewMass']);
Route::get('/client/category/whey',[ClientController::class,'viewWhey']);
Route::get('/client/category/BCAAsEAAs',[ClientController::class,'viewBCAAsEAAs']);
Route::get('/client/category/PreworkoutCreatine',[ClientController::class,'viewPreworkoutCreatine']);
Route::get('/client/category/vitamin',[ClientController::class,'viewVitamin']);
Route::get('/client/category/burnFat',[ClientController::class,'viewBurnFat']);


//Tat ca san pham
Route::get('/client/home/category',[ClientController::class,'viewCategory']);
//Xem chi tiet san pham
Route::get('/client/home/product/{product_id}/{cate_name}',[ClientController::class,'show']);
//Tim kiem
Route::get('/client/home/search',[ClientController::class,'searchInfo']);


//Gio hang
//xem gio hang
Route::get('/client/cartList',[\App\Http\Controllers\CartController::class,'viewCart']);
Route::post('/client/cart/{id}',[\App\Http\Controllers\CartController::class,'addCart']);
Route::delete('/client/cart/{id}/delete',[\App\Http\Controllers\CartController::class,'delete']);
Route::post('/client/cart/{id}/update',[\App\Http\Controllers\CartController::class,'update']);

//Order
Route::get('/client/orderDetail',[\App\Http\Controllers\OrderController::class,'viewOrder']);
Route::post('client/placeOrder',[\App\Http\Controllers\OrderController::class,'checkOut']);


//Tin tức
Route::get('/client/home/tintuc',[ClientController::class,'news']);
