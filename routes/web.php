<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TagController;
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

// Route::get('/dashboard', function () {
//     return view('layouts.master');
// })->middleware(['auth'])->name('dashboard');
Route::get('/', function () {
    return view('layouts.master');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::controller(NoteController::class)->prefix('notes')->name('notes.')->group(function () {
        Route::get('update/{id}', 'getNote')->name('update');
        Route::get('details/{id}', 'getNoteDetail')->name('details');
        Route::get('/', 'getAllNotes')->name('index');
        Route::post('create', 'createNote')->name('create');
        Route::post('update/{id}', 'updateNote')->name('update');
    });

    Route::controller(CategoryController::class)->prefix('categories')->name('categories.')->group(function () {
        Route::get('update/{id}', 'getCategory')->name('update');
        Route::get('/', 'getAllCategories')->name('index');
        Route::get('/tree', 'getTreeCategories')->name('tree');
        Route::post('create', 'createCategory')->name('create');
        Route::put('update/{id}', 'updateCategory')->name('update');
    });

    Route::controller(TagController::class)->prefix('tags')->name('tags.')->group(function () {
        Route::get('update/{id}', 'getTag')->name('update');
        Route::get('search', 'search')->name('search');
        Route::get('/', 'getAllTags')->name('index');
        Route::post('create', 'createTag')->name('create');
        Route::put('update/{id}', 'updateTag')->name('update');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
