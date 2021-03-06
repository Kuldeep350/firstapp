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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home','HomeController@index')->name('home');
       
 
Route::get('/admin','AdminController@index')->name('admin');
    
Route::prefix('admin')->group(function(){
    Route::get('login','Auth\AdminLoginController@showLoginForm')->name('admin-form');
    Route::post('login','Auth\AdminLoginController@login')->name('admin-login');
    Route::post('logout','Auth\AdminLoginController@logout')->name('admin-logout');
    /** Admin reset password routes */
    
    Route::post('password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->
            name('admin.password.email');

    Route::get('password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->
            name('admin.password.request');

    Route::post('password/reset','Auth\AdminResetPasswordController@reset');
    
    Route::get('password/reset/{token}','Auth\AdminResetPasswordController@showLinkRequestForm')->
            name('admin.password.reset');

   
});
        /** CRUD routes  */
    Route::resource('user','user'); 
    /** image upload demo*/
    Route::get('file','FileController@showUploadForm')->name('upload.file');

    Route::post('file','FileController@storeFile');

    /** multiple image upload*/
    Route::get('/multiuploads', 'UploadController@uploadForm');

    Route::post('/multiuploads', 'UploadController@uploadSubmit');
    /** view image */

    Route::get('upload-image','ImageController@index');
    Route::post('upload-image',['as'=>'image.upload','uses'=>'ImageController@uploadImages']);

    /**multiple image */

    Route::get('image','testing@index');
    Route::post('store','testing@store');

    Route::get('test_model1',['as'=>'test_model1', 'uses'=>'Testcontroller@test_model1']);
    Route::get('test_model2',['as'=>'test_model2', 'uses'=>'Testcontroller@test_model2']);

    /**CRUD OPRATION USING AJAX */

   Route::resource('contact','ContactController');
   Route::get('/all/contact','ContactController@Allcontact')->name('all.contact');