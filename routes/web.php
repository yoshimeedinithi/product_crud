<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('product', 'InsertRead');
    Route::post('insertData',[productController::class , 'insert']);
    Route::get('product', [productController::class, 'readdata']);
    //Route::view('update', 'updateview');
    Route::get('updatedelete', [productController::class, 'updateordelete']);
    Route::get('updatedata', [productController::class, 'update']); 
});
