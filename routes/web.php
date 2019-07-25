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

Route::view('/', 'welcome');

// Auth::routes();
Auth::routes(['register' => false ]);

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/edit/{company_id}', 'CompanyController@edit');

Route::get('/destroy/{company_id}', 'CompanyController@destroy');



Route::get('/companies', 'CompanyController@index');
Route::post('/companies', 'CompanyController@store');
Route::get('/companies/{id}', 'CompanyController@show');
Route::post('/companies/{id}', 'CompanyController@edit');
//Route::delete('/companies/{company_id}');

Route::get('/companies/{id}/delete', 'CompanyController@formdelete');
Route::get('/companies/{company_id}/edit', 'CompanyController@formedit');
Route::get('/companies/create', 'CompanyController@create');

Route::resource('companies', 'CompanyController');

Route::resource('employees', 'EmployeeController');
