<?php
// Admin routes
Route::group([
    'prefix'     => 'admin',
    'middleware' => [
        'auth',
        'role:admin'
    ],
], function() {
    
   Route::get('dashboard', function() {
    return view('admin.index');
   });

   Route::resource('users','Admin\User\UserController');

});

Route::resource('courses', 'CourseController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
