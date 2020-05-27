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

use Inertia\Inertia;

Route::get('/create-super/{email}','authentication\RegistrationController@createAdmin');

//Route::get('/','front\FrontController@index')->name('index');
Route::get('/',function (){
    return Inertia::render('Home', [
        'foo' => 'bar',
    ]);
});

Route::group(['middleware' => 'visitor'], function () {
    Route::get('/register', 'authentication\RegistrationController@register')->name('register');
    Route::get('/admin/login','front\FrontController@admin_login')->name('admin_login');
    Route::get('/login', 'authentication\LogController@login')->name('login');
    Route::get('/forgot_password','authentication\ForgotPasswordController@forgot_password')->name('forgot_password');
    Route::POST('/post_forgot_password','authentication\ForgotPasswordController@post_forgot_password')->name('post_forgot_password');

    //activation
    Route::get('/activate/{email}/{activationCode}','authentication\ActivationController@activate');

    Route::post('/store', 'authentication\RegistrationController@store')->name('register_user');

    //forgot_password
    Route::get('/reset_password/{email}/{code}','authentication\ForgotPasswordController@reset');
    Route::post('/reset_password/{email}/{code}','authentication\ForgotPasswordController@post_reset')->name('post_password_reset');

});
//Authentication
Route::post('/logout', 'authentication\LogController@logout')->name('logout');
Route::post('/login/check', 'authentication\LogController@check')->name('login_check');




//Admin
Route::get('/dashboard','admin\AdminController@dashboard')->name('dashboard');


//Room
Route::get('/room-type','admin\RoomtypeController@room_type_add')->name('room_type_add');
Route::get('/view-room-type','admin\RoomtypeController@room_type_view')->name('room_type_view');
Route::get('/confirm-room-type/{id}','admin\RoomtypeController@confirm_room_type')->name('confirm_room_type');
Route::post('/room-type','admin\RoomtypeController@post_room_type')->name('post_room_type');
Route::get('/room-type-edit/{id}','admin\RoomtypeController@room_type_edit')->name('room_type_edit');
Route::post('/room-type-edit/{id}','admin\RoomtypeController@post_room_type_edit')->name('post_room_type_edit');
Route::post('/room-type/edit-image/{id}','admin\ImageRoomTypeController@store')->name('edit_upload_roomtype');
Route::get('/room-type-edit/delete-image/{id}','admin\ImageRoomTypeController@delete')->name('delete_upload_roomtype');

//Amenity
Route::get('/add-amenity','admin\AmenityController@add_amenity')->name('add_amenity');
Route::post('/add-amenity','admin\AmenityController@post_amenity')->name('post_amenity');
Route::get('/confirm-amenity/{id}','admin\AmenityController@confirm_amenity')->name('confirm_amenity');
Route::post('/edit-amenity/{id}','admin\AmenityController@edit_amenity')->name('edit_amenity');
Route::get('/delete-amenity/{id}','admin\AmenityController@delete_amenity')->name('delete_amenity');

//Activity
Route::get('/view-activities','admin\ActivityController@index')->name('view_activities');
Route::get('/add-activity','admin\ActivityController@add_activity')->name('add_activity');
Route::post('/add-activity','admin\ActivityController@post_activity')->name('post_activity');
Route::get('/confirm-activity/{id}','admin\ActivityController@confirm_activity')->name('confirm_activity');
Route::post('/edit-activity/{id}','admin\ActivityController@edit_activity')->name('edit_activity');
Route::get('/delete-activity/{id}','admin\ActivityController@delete_activity')->name('delete_activity');

//Paid-Service
Route::get('/paid-service','admin\ServiceController@add_paid_service')->name('add_paid_service');
Route::get('/view-service','admin\ServiceController@view_paid_service')->name('view_paid_service');
Route::post('/paid-service','admin\ServiceController@post_paid_service')->name('post_paid_service');
Route::get('/confirm-service/{id}','admin\ServiceController@confirm_paid_service')->name('confirm_paid_service');

//Floor
Route::get('/view-floor','admin\FloorController@view_floor')->name('view_floor');
ROute::post('/view-floor','admin\FloorController@post_floor')->name('post_floor');
ROute::get('/confirm-floor/{id}','admin\FloorController@confirm_floor')->name('confirm_floor');


//Room
Route::get('/view-room','admin\RoomController@view_room')->name('view_room');
Route::get('/add-room','admin\RoomController@add_room')->name('add_room');
Route::post('/post-room','admin\RoomController@post_room')->name('post_room');
Route::get('/confirm_room/{id}','admin\RoomController@confirm_room')->name('confirm_room');
Route::post('/edit_room/{id}','admin\RoomController@edit_room')->name('edit_room');


//Calendar
//Route::get('/view-calendar','admin\CalendarController@view_calendar')->name('view_calendar');
Route::get('/view-calendar','admin\BookingController@check_available')->name('view_calendar');
Route::post('/view-calendar','admin\BookingController@post_roomtype')->name('post_calendar');

//Room
Route::get('/room-overview','front\FrontController@room_overview')->name('room_overview');
Route::get('/single-room/{slug}','front\FrontController@single_room')->name('single_room');


//manual booking
Route::get('/manual_booking','admin\BookingController@index')->name('booking_manual');
Route::post('/manual_booking','admin\BookingController@post_manual_booking')->name('post_booking_manual');

//all bookings
Route::get('/all_bookings','admin\BookingController@view_all_bookings')->name('all_bookings');

//Contact

Route::get('/contact','front\FrontController@contact')->name('contact');
Route::post('/contact','front\FrontController@post_contact')->name('post_contact');

//Simple Setting
Route::get('/simple-setting','admin\SimpleSettingController@setup')->name('manage_simple');
Route::post('/simple-setting/post','admin\SimpleSettingController@postSimple')->name('postSimple');
Route::post('/simple-setting/post/edit','admin\SimpleSettingController@editPostSimple')->name('editSimple');

//user management
Route::prefix('/admin/users')->group(function () {
    Route::get('/view','admin\UserController@index')->name('view_users');
    Route::post('/edit_role/{user_id}','admin\UserController@edit_role')->name('edit_role');

    //permissions related : system users
    Route::get('/system','admin\UserController@view_system_users')->name('system_users');
    Route::get('/delete_user/{id}','admin\UserController@delete_user')->name('delete_system_user');
    Route::get('/edit_system_user/{id}','admin\UserController@edit_user')->name('edit_system_user');
    Route::post('/edit_system_user/{id}','admin\UserController@post_edit_user')->name('post_edit_system_user');
    Route::get('/add_system_user','admin\UserController@add_system_user')->name('add_system_user');
    Route::post('/add_system_user','admin\UserController@register_system_user')->name('register_system_user');

    //manage permissions
    Route::get('/permissions','admin\PermissionController@index')->name('manage_permissions');
    Route::get('/permissions/add','admin\PermissionController@add')->name('add_permissions');
    Route::post('/permissions/post_add','admin\PermissionController@post_add')->name('post_add_permission');
    Route::get('/permissions/delete/{id}','admin\PermissionController@destroy')->name('delete_permission');
    Route::post('/permissions/edit/{id}','admin\PermissionController@edit')->name('post_edit_permission');

});