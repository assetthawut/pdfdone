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


// Reply Controller 
Route::get('pdf/reply/getform/{id}', 'ReplyController@getForm');
Route::resource('pdf/reply', 'ReplyController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test',function(){


    // $obj = [{
    //     "display": "pdf",
    //     "settings": {
    //       "pdf": {
    //         "id": "1ec0f8ee-6685-5d98-a847-26f67b67d6f0",
    //         "src": "https://files.form.io/pdf/5ba0d85a5b1c17478bd42cee/file/7dacad40-7b37-574d-972e-4d0604b21424"
    //       }
    //     }
    //   }];

    $obj = '{
        "display": "pdf",
        "settings": {
          "pdf": {
            "id": "1ec0f8ee-6685-5d98-a847-26f67b67d6f0",
            "src": "https://files.form.io/pdf/5ba0d85a5b1c17478bd42cee/file/7dacad40-7b37-574d-972e-4d0604b21424"
          }
        }
      }';

     

    //  dd($obj);


$json = '{"1":"a","2":"b","3":"c","4":"d","5":"e"}';
$obj = json_decode($obj, TRUE);

foreach($obj as $key => $value) 
{
    $obj['components']= 'sdfsdf';
  
}

$obj = json_encode($obj);
return $obj;

});
