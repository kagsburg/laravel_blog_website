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

Auth::routes(['register'=>false]);

//login
Route::get('user/login','FrontendController@login')->name('login.form');
Route::post('user/login','FrontendController@loginSubmit')->name('login.submit');
Route::get('user/logout','FrontendController@logout')->name('user.logout');

// Reset password
Route::post('password-reset', 'FrontendController@showResetForm')->name('password.reset'); 
//home
Route::get('/','FrontendController@home')->name('home');

// Frontend Routes
Route::get('/home', 'FrontendController@index');
Route::get('/about-us','FrontendController@aboutUs')->name('about-us');
Route::get('/contact','FrontendController@contact')->name('contact');
Route::post('/contact/message','MessageController@store')->name('contact.store');
//Room
Route::get('room-detail/{slug}','FrontendController@roomDetail')->name('room-detail');
Route::get('/room-detail/lang/{locale}', 'FrontendController@roomlang');
Route::get('room-image/{id}','FrontendController@roomByImage')->name('room.image');
Route::post('/room/search','FrontendController@roomSearch')->name('room.search');
Route::get('/room-cat/{slug}','FrontendController@roomCat')->name('room-cat');
Route::get('/room-sub-cat/{slug}/{sub_slug}','FrontendController@roomSubCat')->name('room-sub-cat');
Route::get('/room-grids','FrontendController@roomGrids')->name('room-grids');
Route::get('/room-lists','FrontendController@roomLists')->name('room-lists');
Route::match(['get','post'],'/filter','FrontendController@roomFilter')->name('room.filter');

//room review
Route::resource('/review','RoomReviewController');
Route::post('room/{slug}/review','RoomReviewController@store')->name('review.store');

//Order
Route::get('/checkout','FrontendController@checkout')->name('checkout');
Route::post('/checkout/message','BookController@store')->name('checkout.store');
// Blog
Route::get('/blog','FrontendController@blog')->name('blog');
Route::get('/blog-detail/{slug}','FrontendController@blogDetail')->name('blog.detail');
Route::get('/blog-detail/lang/{locale}', 'FrontendController@bloglang');
Route::get('/blog/search','FrontendController@blogSearch')->name('blog.search');
Route::post('/blog/filter','FrontendController@blogFilter')->name('blog.filter');
Route::get('blog-cat/{slug}','FrontendController@blogByCategory')->name('blog.category');
Route::get('blog-tag/{slug}','FrontendController@blogByTag')->name('blog.tag');

// NewsLetter
Route::post('/subscribe','FrontendController@subscribe')->name('subscribe');

// Post Comment 
Route::post('post/{slug}/comment','PostCommentController@store')->name('post-comment.store');
Route::resource('/comment','PostCommentController');

// Backend section start

Route::group(['prefix'=>'/admin','middleware'=>['auth','admin']],function(){
    Route::get('/','AdminController@index')->name('admin');

    // user route
    Route::resource('users','UsersController');
    // Banner
    Route::resource('banner','BannerController');
    // Profile
    Route::get('/profile','AdminController@profile')->name('admin-profile');
    Route::post('/profile/{id}','AdminController@profileUpdate')->name('profile-update');
    // Category
    Route::resource('/category','CategoryController');
    // Room
    Route::resource('/room','RoomController');
    // Image 
    Route::resource('image','ImageController');
    // Ajax for sub category
    Route::post('/category/{id}/child','CategoryController@getChildByParent');
    // POST category
    Route::resource('/post-category','PostCategoryController');
    // Service
    Route::resource('/service','ServiceController');
    // Post tag
    Route::resource('/post-tag','PostTagController');
    // Post
    Route::resource('/post','PostController');
    // Message
    Route::resource('/message','MessageController');
    Route::get('/message/five','MessageController@messageFive')->name('messages.five');
    // Settings
    Route::get('settings','AdminController@settings')->name('settings');
    Route::post('setting/update','AdminController@settingsUpdate')->name('settings.update');
    // Notification
    Route::get('/notification/{id}','NotificationController@show')->name('admin.notification');
    Route::get('/notifications','NotificationController@index')->name('all.notification');
    Route::delete('/notification/{id}','NotificationController@delete')->name('notification.delete');
    // Password Change
    Route::get('change-password', 'AdminController@changePassword')->name('change.password.form');
    Route::post('change-password', 'AdminController@changPasswordStore')->name('change.password');
    // Testimonial 
    Route::resource('testimonial','TestimonyController');
    // Order 
    Route::resource('order','OrderController');
});

Route::get('lang/{locale}', 'HomeController@lang');
Route::get('lang/{locale}', 'FrontendController@lang');
Route::get('lang/{locale}', 'AdminController@lang');

Route::get('/createlink', function() {
	Artisan::call('storage:link');
});