<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ToDoController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');


Route::get('/todos', [ToDoController::class, 'index'])->middleware('auth')->name('todos.index');
Route::post('todos/create', [ToDoController::class, 'create'])->middleware('auth')->name('todos.create');
Route::post('todos/update', [ToDoController::class, 'update'])->middleware('auth')->name('todos.update');
Route::post('todos/delete', [ToDoController::class, 'delete'])->middleware('auth')->name('todos.delete');
Route::get('todos/find', [ToDoController::class, 'find'])->middleware('auth')->name('todo.find');
Route::get('todos/search', [ToDoController::class, 'search'])->middleware('auth')->name('todo.search');
