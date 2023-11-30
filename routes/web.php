<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentController;

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

Auth::routes();
Route::middleware(['auth'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('issues',[BookController::class,'indexIssues'])->name('books.issues');
    Route::resource('books', BookController::class);
    Route::resource('customers', UserController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::post('add-rent/{rent}', [RentController::class,'rentBook'])->name('rent.add');
    Route::post('return/{book}/{rent}', [RentController::class,'returnBook'])->name('rent.return');
    Route::get('issuesIndex', [RentController::class,'indexIssues']);
    Route::resource('rent', RentController::class);
});


Route::get('/', function () {
    return view('admin.index');
})->middleware('auth');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
