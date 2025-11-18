<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

    // Articles Route
      Route::controller(ArticleController::class)->group(function () {
        Route::get('/articles',  'index')->name('articles.index');
        Route::get('/articles/create',  'create')->name('articles.create');
        Route::post('/articles/store',  'store')->name('articles.store');
        Route::get('articles/{id}/edit','edit')->name('articles.edit');
        Route::post('/articles/{id}', 'update')->name('articles.update');
        Route::delete('/articles', 'destroy')->name('articles.destroy');

    });
    // Users Route
     Route::controller(UserController::class)->group(function () {
        Route::get('/users',  'index')->name('users.index');
        Route::get('/users/create',  'create')->name('users.create');
        Route::post('/users/store',  'store')->name('users.store');
        Route::get('users/{id}/edit','edit')->name('users.edit');
        Route::post('/users/{id}', 'update')->name('users.update');
        Route::delete('/users', 'destroy')->name('users.destroy');
    });
     // Employees Route
Route::controller(EmployeeController::class)->group(function () {
    Route::get('/employees', 'index')->name('employees.index');
    Route::get('/employees/create', 'create')->name('employees.create');
    Route::post('/employees/store', 'store')->name('employees.store');
    Route::get('/employees/{id}/edit', 'edit')->name('employees.edit');
    Route::post('/employees/{id}', 'update')->name('employees.update');
    Route::delete('/employees', 'destroy')->name('employees.destroy');
});
//
Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/create', 'create')->name('products.create');
    Route::post('/products/store', 'store')->name('products.store');
    Route::get('/products/{id}/edit', 'edit')->name('products.edit');
    Route::post('/products/{id}', 'update')->name('products.update');
    Route::delete('/products', 'destroy')->name('products.destroy');
});
//
Route::controller(ReservoirController::class)->group(function () {
    Route::get('/reservoirs', 'index')->name('reservoirs.index');
    Route::get('/reservoirs/create', 'create')->name('reservoirs.create');
    Route::post('/reservoirs/store', 'store')->name('reservoirs.store');
    Route::get('/reservoirs/{id}/edit', 'edit')->name('reservoirs.edit');
    Route::post('/reservoirs/{id}', 'update')->name('reservoirs.update');
    Route::delete('/reservoirs', 'destroy')->name('reservoirs.destroy');
});
//
Route::controller(DriverController::class)->group(function () {
    Route::get('/drivers', 'index')->name('drivers.index');
    Route::get('/drivers/create', 'create')->name('drivers.create');
    Route::post('/drivers/store', 'store')->name('drivers.store');
    Route::get('/drivers/{id}/edit', 'edit')->name('drivers.edit');
    Route::post('/drivers/{id}', 'update')->name('drivers.update');
    Route::delete('/drivers', 'destroy')->name('drivers.destroy');
});
//
Route::controller(CompanyController::class)->group(function () {
    Route::get('/companies', 'index')->name('companies.index');
    Route::get('/companies/create', 'create')->name('companies.create');
    Route::post('/companies/store', 'store')->name('companies.store');
    Route::get('/companies/{id}/edit', 'edit')->name('companies.edit');
    Route::post('/companies/{id}', 'update')->name('companies.update');
    Route::delete('/companies', 'destroy')->name('companies.destroy');
});


});

require __DIR__.'/auth.php';
