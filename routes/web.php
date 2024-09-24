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

//Route::get('/ongkir', 'CekController@index');
//Route::post('/ongkir', 'CekController@check_ongkir');
//Route::get('/cities/{province_id}', 'CekController@getCities');

//Route::get('/cek', function () {
//    return view('cek');
//});

//Route::get('/ongkir', 'CekController@index');
//Route::post('/', 'CekController@submit');
//Route::get('/province/{id}/cities', 'CekController@getCities');

//SITEMAP
Route::get('sitemap.xml','SitemapController@index');
Route::get('sitemap.xml/artikel','SitemapController@artikel');
Route::get('sitemap.xml/produk','SitemapController@produk');
Route::get('sitemap.xml/kategori-artikel','SitemapController@katartikel');
Route::get('sitemap.xml/kategori-produk','SitemapController@katproduk');
Route::get('sitemap.xml/lokasi','SitemapController@lokasi');

//TANPA LOGIN
Route::get('/', 'IndexController@index');
Route::get('/about', 'StaticController@about');
Route::get('/lokasi/{slug}', 'IndexController@place');
Route::get('/produk/{slug}', 'DetailController@produk');
Route::get('/artikel/{slug}', 'DetailController@artikel');
Route::get('/kategori/produk/{slug}', 'IndexController@katproduk');
Route::get('/kategori/artikel/{slug}', 'IndexController@katartikel');
Route::get('/artikel', 'IndexController@artikel');
Route::get('/produk', 'IndexController@produk');

Route::group(['middleware' => ['auth','CheckRole:member']], function(){
    
    //Wishlist
    Route::get('wishlist', 'WishlistController@index');
    Route::get('wishlist/delete/{id}', 'WishlistController@destroy');
    Route::get('wishlist/{url}', 'WishlistController@store');
    
    //Address
    Route::resource('address','AddressController');
    Route::post('address/update','AddressController@update');
    Route::get('/province/{id}/cities','AddressController@getCities');
    
    //Keranjang/Pesanan
//    Route::get('keranjang','PesananController@index');
//    Route::post('tambahkeranjang/{id}','PesananController@store');
//    Route::get('hapuskeranjang/{id}','PesananController@delete');
//    Route::get('order-detail/{id}','PesananController@pesanandetail');
//    Route::get('order-cancel/{id}','PesananController@cancel');
    
    //Dashboard
    Route::get('account','DashboardController@index');
    
    //Riwayat
//    Route::get('history','DashboardController@order');
//    
//    //Checkout
//    Route::resource('checkout','CheckoutController');
//    
//    //Buat pesanan
//    Route::post('/pesan/{id}','OrderController@store');
//    
//    //CetakPDF
//    Route::get('/cetak-pdf', 'CheckoutController@cetakPDF');
//    
    //Ongkir
//    Route::post('/cekongkir', 'CheckoutController@submit');
//    Route::post('/updateongkir', 'CheckoutController@updateongkir');
//    Route::post('/updatebayar', 'CheckoutController@updatebayar');
    
});

Route::group(['middleware' => ['auth','CheckRole:admin']], function(){
    
    //Order
//    Route::get('order/all', 'Admin\OrderController@index');
//    Route::get('order/entry', 'Admin\OrderController@entry');
//    Route::get('order/dp', 'Admin\OrderController@dp');
//    Route::get('order/process', 'Admin\OrderController@process');
//    Route::get('order/history', 'Admin\OrderController@history');
//    Route::get('order/cetakPDF', 'Admin\OrderController@cetakPDF');
//    Route::get('order/cetakPDF1', 'Admin\OrderController@cetakPDF1');
//    Route::get('order/cetakPDF2', 'Admin\OrderController@cetakPDF2');
//    Route::get('order/cetakPDF3', 'Admin\OrderController@cetakPDF3');
    
    //filemanager
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    //CRUD Artikel
    Route::resource('article','Admin\ArticleController');
    //CRUD Order
//    Route::resource('order','Admin\OrderController');
    //CRUD Produk
    Route::resource('product','Admin\ProductController');
    //Dashboard Admin
    Route::get('/admin/dashboard', 'Admin\AdminDBController@index');
    //CRUD Kategori Product
    Route::resource('category','Admin\CategoryController');
    //CRUD Kategori Artikel
    Route::resource('art-category','Admin\ArtCategoryController');
    //CRUD Lokasi
    Route::resource('place','Admin\PlaceController');
    //Daftar User
    Route::get('/user', 'Admin\UserController@index');
    //Detail User
    Route::get('/user/detail/{id}', 'Admin\UserController@detail');
    //Hapus User
    Route::get('/user/hapus/{id}', 'Admin\UserController@delete');
    //upload image ckeditor product
    Route::post('/image_upload/product', 'Admin\ProductController@upload')->name('upload_product');
    //upload image ckeditor article
    Route::post('/image_upload/article', 'Admin\ArticleController@upload')->name('upload_article');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
