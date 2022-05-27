<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home',([HomeController::class, 'index']))->name("home");
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name("logout");

//attendances Routes
Route::get('/parents','App\Http\Controllers\Web\ParentController@index')->name('parents');
Route::get('/parent/create','App\Http\Controllers\Web\ParentController@create')->name('parent.create');
Route::post('/parent/store','App\Http\Controllers\Web\ParentController@store')->name('parent.store');
Route::post('/parent/update{id}','App\Http\Controllers\Web\ParentController@update')->name('parent.update');
Route::get('/parent/show/{id}', 'App\Http\Controllers\Web\ParentController@show')->name('parent.show');
Route::get('/parent/edit/{id}','App\Http\Controllers\Web\ParentController@edit')->name('parent.edit');
Route::get('/parent/delete/{id}','App\Http\Controllers\Web\ParentController@destroy')->name('parent.destroy');

//Students Routes
Route::get('/students','App\Http\Controllers\Web\StudentController@index')->name('students');
Route::get('/students/create/{id}','App\Http\Controllers\Web\StudentController@create')->name('student.create');
Route::post('/student/store','App\Http\Controllers\Web\StudentController@store')->name('student.store');
Route::post('/student/update/{id}','App\Http\Controllers\Web\StudentController@update')->name('student.update');
Route::get('/student/show/{id}', 'App\Http\Controllers\Web\StudentController@show')->name('student.show');
Route::get('/student/edit/{id}','App\Http\Controllers\Web\StudentController@edit')->name('student.edit');
Route::get('/student/delete/{id}','App\Http\Controllers\Web\StudentController@destroy')->name('student.destroy');

//Teacher Routes
Route::get('/teachers','App\Http\Controllers\Web\TeacherController@index')->name('teacher.index');
Route::get('/teacher/create','App\Http\Controllers\Web\TeacherController@create')->name('teacher.create');
Route::post('/teacher/store','App\Http\Controllers\Web\TeacherController@store')->name('teacher.store');
Route::post('/teacher/update/{id}','App\Http\Controllers\Web\TeacherController@update')->name('teacher.update');
Route::get('/teacher/show/{id}', 'App\Http\Controllers\Web\TeacherController@show')->name('teacher.show');
Route::get('/teacher/edit/{id}','App\Http\Controllers\Web\TeacherController@edit')->name('teacher.edit');
Route::get('/teacher/delete/{id}','App\Http\Controllers\Web\TeacherController@destroy')->name('teacher.destroy');

//attendances Routes
Route::get('/attendances','App\Http\Controllers\Web\AbsenceController@index')->name('attendance');
Route::get('/attendance/create','App\Http\Controllers\Web\AbsenceController@create')->name('attendance.create');
Route::post('/attendance/store','App\Http\Controllers\Web\AbsenceController@store')->name('attendance.store');
Route::post('/attendance/update{id}','App\Http\Controllers\Web\AbsenceController@update')->name('attendance.update');
Route::get('/attendance/show/{id}', 'App\Http\Controllers\Web\AbsenceController@show')->name('attendance.show');
Route::get('/attendance/edit/{id}','App\Http\Controllers\Web\AbsenceController@edit')->name('attendance.edit');
Route::get('/attendance/delete/{id}','App\Http\Controllers\Web\AbsenceController@destroy')->name('attendance.destroy');


//exams Routes
Route::get('/exams','App\Http\Controllers\Web\ExamController@index')->name('exam');
Route::get('/exam/create','App\Http\Controllers\Web\ExamController@create')->name('exam.create');
Route::post('/exam/store','App\Http\Controllers\Web\ExamController@store')->name('exam.store');
Route::post('/exam/update{id}','App\Http\Controllers\Web\ExamController@update')->name('exam.update');
Route::get('/exam/show', 'App\Http\Controllers\Web\ExamController@show')->name('exam.show');
Route::get('/exam/edit/{id}','App\Http\Controllers\Web\ExamController@edit')->name('exam.edit');
Route::get('/exam/delete/{id}','App\Http\Controllers\Web\ExamController@destroy')->name('exam.destroy');

