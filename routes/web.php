<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// import my controller
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // route get index todo 
    Route::get('todo',[TodoController::class, 'index'])->name(('todo.index'));
    // route get create todo
    Route::get('todo/create',[TodoController::class, 'create'])->name('todo.create');
    // route get edit todo
    Route::get('todo/{todo}',[TodoController::class, 'edit'])->name('todo.edit');
    // route get index user
    Route::get('user',[UserController::class, 'index'])->name('user.index');

});

require __DIR__.'/auth.php';
