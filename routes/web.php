<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListController;

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

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('lists', ListController::class);
    //Route::post('lists/{list}/tasks', [TaskController::class, 'store'])->name('store-task');
    
    Route::resource('tasks', TaskController::class)->except('create', 'store');
    Route::get('tasks/create/{list}', [TaskController::class, 'create'])->name('tasks/create/{list}');
    Route::post('tasks/create/{list}', [TaskController::class, 'store'])->name('tasks/create/{list}');
    Route::put('state/{task}', [TaskController::class, 'changeState'])->name('changeState');
});
