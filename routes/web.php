<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('student','StudentController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/delete/{id}', 'StudentController@destroy')->name('student.destroy');
Route::post('/add_mark/{id}', 'StudentController@add_mark')->name('student.add_mark');
Route::get('/pdf/{id}', 'PdfController@student_pdf')->name('pdf');
Route::get('/export_excel', 'PdfController@export_excel')->name('export_excel');
