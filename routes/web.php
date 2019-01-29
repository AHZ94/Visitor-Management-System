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

Auth::routes();


//Home Page
Route::get('/', function () {
    return view('auth.login');

});

//REPORT
Route::get('/home', 'ReportController@index')->name('home')->middleware('admin','status');
Route::get('/report/appointment','ReportController@appointment')->name('report.appointment');
Route::get('/report/visitor','ReportController@visitor')->name('report.visitor');
Route::get('/report/vehicle','ReportController@vehicle')->name('report.vehicle');
Route::get('/report/staff','ReportController@staff')->name('report.staff');

//EXPORT
Route::get('/report/download','ReportController@export');
Route::get('/download/staff','ReportController@userExport');
Route::get('/download/visitor','ReportController@visitorExport');
Route::get('/download/vehicle','ReportController@vehicleExport');

//VEHIICLE
Route::get('/vehicle/{visitor}/create','VehicleController@create')->name('create-vehicle');
Route::post('/vehicle/{visitor}','VehicleController@store')->name('add-vehicle');
Route::delete('/vehicle/{vehicle}','VehicleController@destroy')->name('delete-vehicle');

//VISITOR
Route::resource('visitor','VisitorController');
Route::post('/visitor/filter','VisitorController@filter');

//USER
Route::resource('user','UserController');
Route::get('/user/{user}/profile','UserController@profile')->name('user.profile');

//APPOINTMENT
Route::resource('appointment','AppointmentController');
Route::get('/existing','AppointmentController@existing')->name('appointment.existing');
Route::get('/existing/{visitor}','AppointmentController@existingId')->name('appointment.existing-id');
Route::post('/existing/{visitor}/make-appointment','AppointmentController@make')->name('appointment.make-appointment');
Route::patch('/appointment/{appointment}/check-in','AppointmentController@checkIn')->name('appointment.check-in');
Route::patch('/appointment/{appointment}/check-out','AppointmentController@checkOut')->name('appointment.check-out');	
Route::patch('/appointment/{appointment}/cancel','AppointmentController@cancel')->name('appointment.cancel');	
Route::get('/search','AppointmentController@search')->name('appointment.search');	

//SEARCH
Route::post('/visitor/search','SearchController@visitor');
Route::post('/staff/search','SearchController@staff');
Route::post('/report/search-visitor','SearchController@report_visitor');
Route::post('/report/search-staff','SearchController@report_staff');

//EXTRA
Route::get('newVisitor',function(){
	return view('Appointment.newVisitors');
});
