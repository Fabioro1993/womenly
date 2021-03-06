<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;


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
    return Redirect::to('productos');
    //return view('welcome');
});

Route::get('productos', [ProductoController::class, 'index']);

Route::post('productos/store', [ProductoController::class, 'store']);

Route::get('productos/edit', [ProductoController::class, 'edit'])->name('productos/edit');

Route::post('productos/update/{id}', [ProductoController::class, 'update']);

Route::get('productos/delete/{id}', [ProductoController::class, 'destroy']);