<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\Controller;

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

Route::get('todo/', [TodoController::class, 'index'])->middleware('auth');
Route::post('todo/', [TodoController::class, 'store'])->middleware('auth');
Route::get('todo/{id}', [TodoController::class, 'edit'])->middleware('auth');
Route::delete('todo/{id}', [TodoController::class, 'destroy'])->middleware('auth');
Route::put('todo/{id}',[TodoController::class, 'update'])->middleware('auth');

// Route::get('/csv', [TodoController::class, 'export'])->name('export');
// Route::get('/file', [TodoController::class, 'csvfile']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('dashboard/', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/',function(){
    return view('welcome2');
});

