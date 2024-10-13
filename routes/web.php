<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerifyEmailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return redirect('/login');
});

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'auth']);

Route::get('/verifyEmail', [VerifyEmailController::class, 'show'])->name('verification.notice');

Route::middleware('auth')->group(function () {
    Route::get('/verifyEmail/{id}/{hash}', [VerifyEmailController::class, 'verify'])->middleware(['signed'])->name('verification.verify');
    Route::post('/verifyEmail/resend', [VerifyEmailController::class, 'resend'])->name('verification.send');
    Route::post('/logout', function(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    });

    Route::get('/dashboard', function () {
        return view('dashboard', [
            'user' => Auth::user(),
        ]);
    })->name('dashboard');

    Route::get('/dashboard/books', [BookController::class, 'index'])->name('book.index');
    Route::get('/dashboard/books/search', [BookController::class, 'search'])->name('book.search');
    Route::get('/dashboard/books/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/book', [BookController::class, 'store'])->name('book.store');
    Route::get('/dashboard/books/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/book/{book}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/book/{book}', [BookController::class, 'destroy'])->name('book.destroy');

    Route::get('/dashboard/authors', [AuthorController::class, 'index'])->name('author.index');
    Route::get('/dashboard/authors/search', [AuthorController::class, 'search'])->name('author.search');
    Route::get('/dashboard/authors/create', [AuthorController::class, 'create'])->name('author.create');
    Route::post('/author', [AuthorController::class, 'store'])->name('author.store');
    Route::get('/dashboard/authors/edit/{author}', [AuthorController::class, 'edit'])->name('author.edit');
    Route::put('/author/{author}', [AuthorController::class, 'update'])->name('author.update');
    Route::delete('/author/{author}', [AuthorController::class, 'destroy'])->name('author.destroy');
});
