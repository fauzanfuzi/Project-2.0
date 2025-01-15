<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\ProfileController;
//settings
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\UpcomingBillController;
use App\Http\Controllers\ExpenseController;

//----------Auth Route-------------//
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//----------Auth Route-------------//

//----------HOME ROUTES-------------//
//Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::post('/home/mark-as-done/{id}', [HomeController::class, 'markAsDone'])->name('home.markAsDone');
//----------HOME ROUTES-------------//
//----------SETTINGS ROUTES-------------//
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::post('/balance', [BalanceController::class, 'store'])->name('balance.store');

Route::post('/budget', [BudgetController::class, 'store'])->name('budget.store');

Route::post('/upcoming-bills', [UpcomingBillController::class, 'store'])->name('upcomingbills.store');

Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');

//----------SETTINGS ROUTES-------------//

//----------PROFILE ROUTES-------------//
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
//----------PROFILE ROUTES-------------//

//----------FINANCE ROUTES-------------//
//Route::get('/finance/thismonth', [FinanceController::class, 'thismonth'])->name('finance.thismonth');
Route::get('/finance', [FinanceController::class, 'index'])->name('finance');
//----------FINANCE ROUTES-------------//