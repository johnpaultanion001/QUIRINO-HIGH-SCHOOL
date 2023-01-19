<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    // return what you want
});


Route::redirect('/', '/admin/classes');


Auth::routes(['verify' => true]);


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // // Dashboard
    // Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // //Manage Attendance
    // Route::resource('attendance', 'AttendanceController');
    // Route::get('attendances', 'AttendanceController@attendances')->name('attendances.attendances');
    
    // //ATTENDANCE RECORDS
    // Route::get('attendance_records/{filter}', 'AttendanceController@attendance_records')->name('attendance_records');


    //Accounts
    Route::get('account_teachers', 'AccountController@account_teachers')->name('account.account_teachers');
    Route::get('account_parents', 'AccountController@account_parents')->name('account.account_parents');
    Route::get('admins', 'AccountController@admins')->name('account.admins');
    
    Route::post('account/store', 'AccountController@store')->name('account.store');
    Route::get('account/{account}/edit', 'AccountController@edit')->name('account.edit');
    Route::put('account/{account}', 'AccountController@update')->name('account.update');
    Route::delete('account/{account}', 'AccountController@destroy')->name('account.destroy');

    //Mange Classes
    Route::resource('classes', 'ClassesController');
    Route::post('classes/view/assign', 'ClassesController@store_teacher_student')->name('classes.store_teacher_student');
    Route::delete('classes/view/assign/{id}/{role}', 'ClassesController@store_teacher_student_destroy')->name('classes.store_teacher_student_destroy');
    Route::get('classes/advisory/{id}', 'ClassesController@advisory')->name('classes.advisory');

    //Mange Subjects
    Route::resource('subjects', 'SubjectController');

    //Mange teachers
    Route::resource('teachers', 'TeacherController');

    //Mange students
    Route::resource('students', 'StudentController');

    //Mange parents
    Route::resource('parents', 'ParentsController');
    Route::resource('parent_students', 'StudentParentController');

});

// Teacher section
Route::group(['prefix' => 'teacher', 'as' => 'teacher.', 'namespace' => 'Teacher', 'middleware' => ['auth']], function () {
    // classes
    Route::get('classes', 'ClassesController@classes')->name('classes');

    // attendance
    Route::get('classes_attendance/{classes}/attendance', 'ClassesController@attendance')->name('attendance');
    Route::get('classes_attendance', 'ClassesController@classes_attendance')->name('classes_attendance');
    
    Route::get('classes/{teacher_id}/{student_id}/{class_id}/attendance', 'ClassesController@attendance_store')->name('attendance_store');
    Route::delete('attendance/{id}', 'ClassesController@delete_attendance')->name('delete_attendance');
    // all classes
    Route::resource('students', 'StudentController');
    Route::get('students/{class}/classess', 'StudentController@classess_student')->name('classess_student');
    Route::resource('activity', 'ActivityController');

    Route::get('notification', 'NotificationController@store')->name('notif.store');
});


// Parent section
Route::group(['prefix' => 'parent', 'as' => 'parent.', 'namespace' => 'Parent', 'middleware' => ['auth']], function () {
   
    //Mange students
   Route::resource('students', 'StudentController');

   Route::get('notifications', 'StudentController@parentNotification')->name('parentNotification');
   Route::get('faq', 'StudentController@faq')->name('faq');

   

});