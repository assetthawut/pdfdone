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


// PDF  Controller 
Route::get('pdf/form/show','PdfController@showjson');
Route::get('pdf/form/create/pdfbyid/{id}','PdfController@createPdfById');
Route::post('pdf/form/create/pdfbyid','PdfController@storePdfById');


Route::resource('pdf/builder', 'PdfController');

// Form Controller
Route::get('pdf/form/test', 'FormController@test');
Route::resource('pdf/form', 'FormController');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
