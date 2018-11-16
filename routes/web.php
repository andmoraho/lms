<?php
Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::resource('courses', 'CourseController');
