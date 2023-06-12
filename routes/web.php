<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/library', function () {
    return view('library.index');
})->middleware(['auth', 'verified'])->name('library.index');

Route::get('/library/create',[BookController::class, 'create'])->name('library.create');
Route::post('/library/store',[BookController::class, 'store'])->name('library.store');

Route::get('/borrower',[BorrowerController::class,'index'])->name('borrower.index');
Route::post('/borrower/store',[BorrowerController::class,'store'])->name('borrower.store');

Route::get('/borrower/create/{id}',[BorrowerController::class,'create'])->name('borrower.create');
Route::get('/borrower/edit/{id}',[BorrowerController::class,'edit'])->name('borrower.edit');
Route::post('/borrower/update/{id}',[BorrowerController::class,'update'])->name('borrower.update');
Route::delete('/borrower/delete/{id}',[BorrowerController::class,'destroy'])->name('borrower.delete');

Route::get('/library/show/{id}',[BookController::class, 'show'])->name('library.show');
Route::get('/library/edit/{id}',[BookController::class, 'edit'])->name('library.edit');
Route::put('/library/update/{id}',[BookController::class, 'update'])->name('library.update');
Route::delete('/library/delete/{id}',[BookController::class, 'destroy'])->name('library.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/library',[BookController::class, 'index'])->name('library.index');
});

require __DIR__.'/auth.php';
