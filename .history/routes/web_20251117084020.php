<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ChequeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LendController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservoirController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
        Route::get('/permissions/index', 'index')->name('permissions.index');
        Route::get('/permissions/create', 'create')->name('permissions.create');
        Route::post('/permissions/store', 'store')->name('permissions.store');
        Route::get('/permissions/{id}/edit', 'edit')->name('permissions.edit');
        Route::post('/permissions/{id}', 'update')->name('permissions.update');
        Route::delete('/permissions', 'destroy')->name('permissions.destroy');

    });
    // Role Routes
    Route::controller(RoleController::class)->group(function () {
        Route::get('/roles', 'index')->name('roles.index');
        Route::get('/roles/create', 'create')->name('roles.create');
        Route::post('/roles/store', 'store')->name('roles.store');
        Route::get('roles/{id}/edit', 'edit')->name('roles.edit');
        Route::post('/roles/{id}', 'update')->name('roles.update');
        Route::delete('/roles', 'destroy')->name('roles.destroy');

    });

    // Articles Route
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/articles', 'index')->name('articles.index');
        Route::get('/articles/create', 'create')->name('articles.create');
        Route::post('/articles/store', 'store')->name('articles.store');
        Route::get('articles/{id}/edit', 'edit')->name('articles.edit');
        Route::post('/articles/{id}', 'update')->name('articles.update');
        Route::delete('/articles', 'destroy')->name('articles.destroy');

    });
    // Users Route
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users.index');
        Route::get('/users/create', 'create')->name('users.create');
        Route::post('/users/store', 'store')->name('users.store');
        Route::get('users/{id}/edit', 'edit')->name('users.edit');
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
    //
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customers', 'index')->name('customers.index');
        Route::get('/customers/create', 'create')->name('customers.create');
        Route::post('/customers/store', 'store')->name('customers.store');
        Route::get('/customers/{id}/edit', 'edit')->name('customers.edit');
        Route::post('/customers/{id}', 'update')->name('customers.update');
        Route::delete('/customers', 'destroy')->name('customers.destroy');
    });
    //
    Route::controller(ImportController::class)->group(function () {
        Route::get('/imports', 'index')->name('imports.index');
        Route::get('/imports/create', 'create')->name('imports.create');
        Route::post('/imports/store', 'store')->name('imports.store');
        Route::get('/imports/{id}/edit', 'edit')->name('imports.edit');
        Route::post('/imports/{id}', 'update')->name('imports.update');
        Route::delete('/imports', 'destroy')->name('imports.destroy');
    });
     ////////////-
    //
    Route::controller(SaleController::class)->group(function () {
        Route::get('/sales', 'index')->name('sales.index');
        Route::get('/sales/create', 'create')->name('sales.create');
        Route::post('/sales/store', 'store')->name('sales.store');
        Route::get('/sales/{id}/edit', 'edit')->name('sales.edit');
        Route::post('/sales/{id}', 'update')->name('sales.update');
        Route::delete('/sales', 'destroy')->name('sales.destroy');
    });
    //
    Route::controller(PaymentController::class)->group(function () {
        Route::get('/payments', 'index')->name('payments.index');
        Route::get('/payments/create', 'create')->name('payments.create');
        Route::post('/payments/store', 'store')->name('payments.store');
        Route::get('/payments/{id}/edit', 'edit')->name('payments.edit');
        Route::post('/payments/{id}', 'update')->name('payments.update');
        Route::delete('/payments', 'destroy')->name('payments.destroy');
    });
    //
    Route::controller(LendController::class)->group(function () {
        Route::get('/lends', 'index')->name('lends.index');
        Route::get('/lends/create', 'create')->name('lends.create');
        Route::post('/lends/store', 'store')->name('lends.store');
        Route::get('/lends/{id}/edit', 'edit')->name('lends.edit');
        Route::post('/lends/{id}', 'update')->name('lends.update');
        Route::delete('/lends', 'destroy')->name('lends.destroy');
    });
    //
    Route::controller(ChequeController::class)->group(function () {
        Route::get('/cheques', 'index')->name('cheques.index');
        Route::get('/cheques/create', 'create')->name('cheques.create');
        Route::post('/cheques/store', 'store')->name('cheques.store');
        Route::get('/cheques/{id}/edit', 'edit')->name('cheques.edit');
        Route::post('/cheques/{id}', 'update')->name('cheques.update');
        Route::delete('/cheques', 'destroy')->name('cheques.destroy');
    });

    //
    Route::controller(TransactionController::class)->group(function () {
        Route::get('/transactions', 'index')->name('transactions.index');
        Route::get('/transactions/create', 'create')->name('transactions.create');
        Route::post('/transactions/store', 'store')->name('transactions.store');
        Route::get('/transactions/{id}/edit', 'edit')->name('transactions.edit');
        Route::post('/transactions/{id}', 'update')->name('transactions.update');
        Route::delete('/transactions', 'destroy')->name('transactions.destroy');
    });
    //
    Route::controller(TaxController::class)->group(function () {
        Route::get('/taxes', 'index')->name('taxes.index');
        Route::get('/taxes/create', 'create')->name('taxes.create');
        Route::post('/taxes/store', 'store')->name('taxes.store');
        Route::get('/taxes/{id}/edit', 'edit')->name('taxes.edit');
        Route::post('/taxes/{id}', 'update')->name('taxes.update');
        Route::delete('/taxes', 'destroy')->name('taxes.destroy');
    });
    //
    Route::controller(DiscountController::class)->group(function () {
        Route::get('/discounts', 'index')->name('discounts.index');
        Route::get('/discounts/create', 'create')->name('discounts.create');
        Route::post('/discounts/store', 'store')->name('discounts.store');
        Route::get('/discounts/{id}/edit', 'edit')->name('discounts.edit');
        Route::post('/discounts/{id}', 'update')->name('discounts.update');
        Route::delete('/discounts', 'destroy')->name('discounts.destroy');
    });
    //
    Route::controller(ExpenseController::class)->group(function () {
        Route::get('/expenses', 'index')->name('expenses.index');
        Route::get('/expenses/create', 'create')->name('expenses.create');
        Route::post('/expenses/store', 'store')->name('expenses.store');
        Route::get('/expenses/{id}/edit', 'edit')->name('expenses.edit');
        Route::post('/expenses/{id}', 'update')->name('expenses.update');
        Route::delete('/expenses', 'destroy')->name('expenses.destroy');
    });

});

require __DIR__.'/auth.php';
