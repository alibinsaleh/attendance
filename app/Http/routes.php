<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/classrooms');
});
Route::resource('classrooms', 'ClassroomsController');
Route::resource('students', 'StudentsController');
Route::resource('courses', 'CoursesController');
Route::resource('test', 'TestController');
Route::resource('studentsdata', 'StudentsDataController');
Route::resource('attendance', 'AttendanceController');
Route::resource('registers', 'RegisterStudentsController');
Route::get('attendance/{id}/{week_id}/showAttendance', 'AttendanceController@showAttendance');

// $router->group([
// 	'namespace' => 'Admin',
// 	'middleware' => 'auth',
// ], function(){
// 	resource('admin/classrooms', 'ClassroomsController');
// 	resource('admin/students', 'StudentsController');
// 	resource('admin/courses', 'CoursesController');
	
// });


// get('/auth/login', 'Auth\AuthController@getLogin');
// post('/auth/login', 'Auth\AuthController@postLogin');
// get('/auth/logout', 'Auth\AuthController@getLogout');


