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
Route::get('adminpanel', 'DynamicPDFController@index');


Route::get('/','HomeController@index')->name('home');
Route::get('/adminpanel','EduCenterController@adminpanel')->name('educenter.adminpanel');
Route::get('/educenter','EduCenterController@index');


Route::get('/login','SessionsController@create');
Route::post('/login','SessionsController@store'); // mana post metodli login
Route::get('/logout','SessionsController@destroy');

Route::get('/createcenter','EduCenterController@createCenter');
Route::post('/createcenter','EduCenterController@store');

Route::resource('EduCenter','EduCenterController'); 

Route::get('/createstudent','StudentController@index');
Route::post('/createstudent','StudentController@store');

Route::get('/student','StudentController@showindex');

Route::get('/report','ReportController@index');


Route::get('/adminpanel/{id}','EduCenterController@show');

Route::get('/educenter/{id}','StudentController@show');

// Route::resource('student','StudentController');


Route::delete('Student/{id}','StudentController@destroy')->name('Student.destroy'); // manabuyerda katta harflarni kichik harfga amashtirib chiq
Route::delete('Student','StudentController@update')->name('Student.update'); // shu yerga ham resource qilsak

Route::delete('Student/{id}','StudentController@destroy')->name('Student.destroy'); 
Route::delete('Student','StudentController@update')->name('Student.update'); 

Route::get('Student/{id}/edit','StudentController@edit');

Route::post('dynamic_dependent1/fetch', 'EduCenterController@fetch')->name('dynamicdependent1.fetch');

Route::post('dynamic_dependent/fetch', 'StudentController@fetch')->name('dynamicdependent.fetch');

Route::get('/report/export', 'ReportExportController@export')->name('report.export');
Route::get('/report/export', 'ReportExportController@export_view')->name('customers.export_view');

// Route::get('adminpanel', 'DynamicPDFController@index');
Route::get('adminpanel-export/pdf', 'DynamicPDFController@pdf');

Route::get('/homepage', 'HomepageController@index');