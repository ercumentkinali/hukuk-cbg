<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\ResetSession;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Middleware\ResetSessionOnHome;

Route::get('/', function () {
    return view('login.default')->with('error', 'Lütfen giriş yapınız');
})->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/index/filter', [BookController::class, 'filter'])->name('books.filter');
    Route::get('/index/search', [BookController::class, 'search'])->name('books.search');
    Route::get('/index', [BookController::class, 'index'])->name('books.index');
    Route::get('/detay/{id}', [BookController::class, 'show'])->name('books.show');
    Route::delete('/detay/{id}', [BookController::class, 'destroy'])->name('books.destroy');
    Route::get('/index/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/index', [BookController::class, 'store'])->name('books.store');
    Route::post('/index/create', [AuthorController::class, 'store'])->name('authors.store');

    Route::post('/genres',  [GenreController::class, 'store'])->name(name: 'genres.store');
    Route::get('/genres', function () {
        return redirect('/index/create');
    });
});




Route::get('/', function () {
    return view('login.default');
})->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login');
