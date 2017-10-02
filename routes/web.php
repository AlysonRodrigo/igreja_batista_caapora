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
    return view('home');
});

// Password reset Routes
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')
    ->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')
    ->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')
    ->name('password.request');


Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function () {

    $this->get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    $this->post('login', 'Admin\Auth\LoginController@login');

    Route::group([
        'namespace' => 'Admin\\',
        'as' => 'admin.',
        'middleware' => ['auth', 'can:admin']
    ], function () {

        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::name('show_details')->get('show_details', 'UsersController@showDetails');
            Route::group(['prefix' => '/{user}/profile'], function () {
                Route::name('profile.edit')->get('', 'UserProfileController@edit');
                Route::name('profile.update')->put('', 'UserProfileController@update');

                Route::name('profile.photo')->get('/photo', 'UserProfileController@photo');
                Route::name('profile.photo.store')->post('/photo', 'UserProfileController@storeImage');
            });
        });

        Route::resource('users', 'UsersController');
        $this->post('logout', 'Auth\LoginController@logout')->name('logout');


    });

});


