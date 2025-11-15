<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

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

    // Permission Routes
    Route::controller(PermissionController::class)->group(function () {
    Route::get('/permissions/index',  'index')->name('permissions.index');
    Route::get('/permissions/create',  'create')->name('permissions.create');
    Route::post('/permissions/store',  'store')->name('permissions.store');
    Route::get('/permissions/{id}/edit',  'edit')->name('permissions.edit');
    Route::post('/permissions/{id}',  'update')->name('permissions.update');
    Route::delete('/permissions', 'destroy')->name('permissions.destroy');

    });
    // Role Routes
    Route::controller(RoleController::class)->group(function () {
        Route::get('/roles',  'index')->name('roles.index');
        Route::get('/roles/create',  'create')->name('roles.create');
        Route::post('/roles/store',  'store')->name('roles.store');
        Route::get('roles/{id}/edit','edit')->name('roles.edit');
        Route::post('/roles/{id}', 'update')->name('roles.update');
        Route::delete('/roles', 'destroy')->name('roles.destroy');

    });

    //
      Route::controller(ArticleController::class)->group(function () {
        Route::get('/articles',  'index')->name('articles.index');
        Route::get('/articles/create',  'create')->name('articles.create');
        Route::post('/articles/store',  'store')->name('articles.store');
        Route::get('articles/{id}/edit','edit')->name('articles.edit');
        Route::post('/articles/{id}', 'update')->name('articles.update');
        Route::delete('/articles', 'destroy')->name('articles.destroy');

    });




});

require __DIR__.'/auth.php';
