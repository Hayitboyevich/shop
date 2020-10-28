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


/*Route::resource('books', 'BookController');

Auth::routes();*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product_by_category/{category_id}', 'HomeController@show_product_by_category');
Route::get('/product_by_manufacture/{manufacture_id}', 'HomeController@show_product_by_manufacture');
Route::get('view_product/{product_id}', 'HomeController@product_details_by_id');
Route::post('add_to_cart', 'CartController@add_to_cart');
Route::match(['get', 'post'],'show_cart', 'CartController@show_cart');

//Checkout Routes
Route::match(['get', 'post'],'login_check', 'CheckoutController@login_check');
Route::match(['get', 'post'],'customer_registration', 'CheckoutController@customer_registration');
Route::match(['get', 'post'],'checkout', 'CheckoutController@checkout');
Route::match(['get', 'post'],'save_shipping', 'CheckoutController@save_shipping');
Route::match(['get', 'post'],'customer_login', 'CheckoutController@customer_login');
Route::match(['get', 'post'],'customer_logout', 'CheckoutController@customer_logout');

//payment
Route::match(['get', 'post'],'payment', 'CheckoutController@payment');




Route::get('admin', 'AdminController@index');
Route::get('dashboard', 'SuperAdminController@index');
Route::post('admin_dashboard', 'AdminController@dashboard');
Route::get('logout', 'SuperAdminController@logout');
 

 //Category
Route::get('add_category', 'CategoryController@index');
Route::get('all_category', 'CategoryController@all_category');
Route::get('edit_category/{category_id}', 'CategoryController@edit_category');
Route::get('delete_category/{category_id}', 'CategoryController@delete_category');
Route::post('update_category/{category_id}', 'CategoryController@update_category');
Route::post('save_category', 'CategoryController@save_category');
Route::get('unactive_category/{category_id}', 'CategoryController@unactive_category');
Route::get('active_category/{category_id}', 'CategoryController@active_category');

//Manufacture
Route::get('add_manufacture', 'ManufactureController@index');
Route::post('save_manufacture', 'ManufactureController@save_manufacture');
Route::get('all_manufacture', 'ManufactureController@all_manufacture');
Route::get('edit_manufacture/{manufacture_id}', 'ManufactureController@edit_manufacture');
Route::post('update_manufacture/{manufacture_id}', 'ManufactureController@update_manufacture');
Route::get('unactive_manufacture/{manufacture_id}', 'ManufactureController@unactive_manufacture');
Route::get('active_manufacture/{manufacture_id}', 'ManufactureController@active_manufacture');
Route::get('delete_manufacture/{manufacture_id}', 'ManufactureController@delete_manufacture');

//pppp
Route::get('add_product', 'ProductController@index');
Route::post('save_product', 'ProductController@save_product');
Route::get('all_product', 'ProductController@all_product');
Route::get('unactive_product/{product_id}', 'ProductController@unactive_product');
Route::get('active_product/{product_id}', 'ProductController@active_product');
Route::get('delete_product/{product_id}', 'ProductController@delete_product');

