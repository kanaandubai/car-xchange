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

// Route::resource('Attr', \App\Http\Controllers\AttributeController::class);
// Route::resource('Attr_value', \App\Http\Controllers\AttributeValueController::class);
// Route::get('Attr_category/{id}', [\App\Http\Controllers\AttributeCategoryController::class,"index"]);
// Route::post('Attr_category/{id}', [\App\Http\Controllers\AttributeCategoryController::class,"update"]);
// Route::resource('Attr', [\App\Http\Controllers\AttributeController::class]);
//Route::get('/test', [App\Http\Controllers\ConfigurationController::class, 'test'])->name('home');

// get catigory and its anncester attributes
// create attribute
// create attribute_value


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
