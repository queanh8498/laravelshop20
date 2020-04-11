<?php

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
use App\nguoidung;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/backend', function () {
    return view('backend.layouts.master');
});
Route::get('/', 'FrontendController@index')->name('frontend.home');
Route::get('/san-pham', 'FrontendController@product')->name('frontend.product');
//Tạo trang Chi tiết Sản phẩm (product-detail)
Route::get('/san-pham/{id}', 'FrontendController@productDetail')->name('frontend.productDetail');
// //HOME FRONTEND
// Route::get('/home', function () {
//     return view('frontend.layouts.master');
// });

//LOẠI SẢN PHẨM
Route::resource('/backend/danhsachloai', 'loaisanphamController');
//SẢN PHẨM
Route::resource('/backend/danhsachsanpham', 'sanphamController');


//Route::get('/home', 'HomeController@index')->name('home');

Route::post('/backend/activate/{nd_id}', 'BackendController@activate')->name('activate');

Route::get('/home', 'HomeController@index')->name('home');
