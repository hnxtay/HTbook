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
//admin

Route::get('admin', [
	'as' => 'admin',
	'uses' => 'AdminController@getIndex'
]);

Route::get('admin-book',[
	'as'=> 'admin_book',
	'uses' => 'AdminController@getBook'
]);

Route::get('admin-type-of-book/{id}',[
	'as'=> 'admin_type_of_book',
	'uses' => 'AdminController@getType_of_book'
]);

Route::get('admin-customer',[
	'as'=> 'admin_customer',
	'uses' => 'AdminController@getCustomer'
]);

Route::get('admin-customer-bill/{id_cus}',[
	'as'=> 'admin_bill',
	'uses' => 'AdminController@getBill'
]);

Route::get('admin-customer-billdetail/{id_bill}',[
	'as'=> 'admin_billdetail',
	'uses' => 'AdminController@getBilldetail'
]);

Route::get('admin-add-book',[
	'as'=> 'admin_addbook',
	'uses' => 'AdminController@getAddbook'
]);

Route::post('admin-add-book',[
	'as'=> 'admin_addbook',
	'uses' => 'AdminController@postAddbook'
]);

Route::get('admin-edit-book/{id}', [
	'as' => 'admin_editbook',
	'uses' => 'AdminController@getEditbook'
]);

Route::post('admin-edit-book',[
	'as' => 'admin_editbook_post',
	'uses' => 'AdminController@postEditbook'
]);

Route::get('admin-delete-book/{id}',[
	'as'=> 'admin_delbook',
	'uses' => 'AdminController@getDelbook'
]);

Route::get('admin-turnover',[
	'as'=> 'admin_turnover',
	'uses' => 'AdminController@getTurnover'
]);

Route::post('admin-turnover',[
	'as'=> 'admin_turnover',
	'uses' => 'AdminController@postTurnover'
]);

Route::get('admin-turnover-week/{week}',[
	'as'=> 'admin_turnover_week',
	'uses' => 'AdminController@getTurnover_week'
]);

Route::get('admin-turnover-month/{month}',[
	'as'=> 'admin_turnover_month',
	'uses' => 'AdminController@getTurnover_month'
]);

Route::get('admin-edit-status/{id}', [
	'as' => 'edit_status',
	'uses' => 'AdminController@getEditstatus'
]);

Route::post('admin-edit-status',[
	'as' => 'admin_edit_status',
	'uses' => 'AdminController@postEditstatus'
]);


//user
Route::get('/', [
	'as' => 'trangchu',
	'uses' => 'PageController@getIndex'
]);

Route::get('trang-chu', [
	'as' => 'trangchu',
	'uses' => 'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
	'as' => 'loaisanpham',
	'uses' => 'PageController@getLoaisp'
]);

Route::get('chi-tiet-san-pham/{id}',[
	'as' => 'chitietsanpham',
	'uses' => 'PageController@getChitietSanpham'
]);

Route::get('gioi-thieu',[
	'as' => 'gioithieu',
	'uses' => 'PageController@getGioithieu'
]);

Route::get('lien-he',[
	'as' => 'lienhe',
	'uses' => 'PageController@getLienhe'
]);

Route::get('add-cart/{id}', [
	'as' => 'addcart',
	'uses' => 'PageController@getAddcart'
]);

Route::get('delete-cart/{id}', [
	'as'=> 'delcart',
	'uses' => 'PageController@getDelcart'
]);

Route::post('update-cart', [
	'as'=> 'updatecart',
	'uses' => 'PageController@postUpdatecart'
]);

Route::get('check-out', [
	'as' => 'checkout',
	'uses' => 'PageController@getCheckout'
]);

Route::post('check-out', [
	'as'=>'checkout',
	'uses' => 'Pagecontroller@postCheckout'
]);

Route::get('dang-nhap',[
	'as'=>'dangnhap',
	'uses' => 'PageController@getLogin'
]);

Route::post('dang-nhap',[
	'as'=>'dangnhap',
	'uses' => 'PageController@postLogin'
]);

Route::get('dang-ki',[
	'as'=>'dangki',
	'uses' => 'PageController@getRegister'
]);

Route::post('dang-ki',[
	'as'=>'dangki',
	'uses' => 'PageController@postRegister'
]);

Route::get('dang-xuat',[
	'as'=>'dangxuat',
	'uses' => 'PageController@getLogout'
]);

Route::get('search',[
	'as'=>'search',
	'uses' => 'PageController@getSearch'
]);

Route::get('profile',[
	'as'=>'profile',
	'uses' => 'PageController@getProfile'
]);

Route::post('profile',[
	'as'=>'profile',
	'uses' => 'PageController@postProfile'
]);

Route::get('user-bill',[
	'as' =>'user_bill',
	'uses' => 'PageController@getUserbill'
]);

Route::get('user-billdetail/{id}',[
	'as' =>'user_billdetail',
	'uses' => 'PageController@getUserbilldetail'
]);


Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');

Route::post('commentPost', 'PageController@postAddcomment')->name("post.ajax.comment.add");




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
