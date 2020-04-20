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


//tạo route cho phép chuyển đổi ngôn ngữ
Route::get('setLocale/{locale}', function ($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
      Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('app.setLocale');

use App\nguoidung;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

//
Route::get('/backend', function () {
    return view('backend.layouts.master');
});

Route::post('/backend/activate/{nd_id}', 'BackendController@activate')->name('activate');

//LOẠI SẢN PHẨM
Route::resource('/backend/danhsachloai', 'loaisanphamController');
//SẢN PHẨM
Route::get('/backend/danhsachsanpham', 'sanphamController@index')->name('backend.danhsachsanpham.index');
Route::resource('/backend/danhsachsanpham', 'sanphamController');


Route::get('/', 'FrontendController@index')->name('frontend.home');
Route::get('/san-pham', 'FrontendController@product')->name('frontend.product');
//Tạo trang Chi tiết Sản phẩm (product-detail)
Route::get('/san-pham/{id}', 'FrontendController@productDetail')->name('frontend.productDetail');
// //HOME FRONTEND
// Route::get('/home', function () {
//     return view('frontend.layouts.master');
// });


//Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home', 'HomeController@index')->name('home');

//trang Liên hệ
Route::get('/lien-he', 'FrontendController@contact')->name('frontend.contact');
Route::post('/lien-he/goi-loi-nhan', 'FrontendController@sendMailContactForm')->name('frontend.contact.sendMailContactForm');

Route::post('/backend/activate/{nd_id}', 'BackendController@activate')->name('activate');
