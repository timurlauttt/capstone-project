<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Farmer\AuthController;
use App\Http\Controllers\Farmer\DashboardController;
use App\Http\Controllers\Farmer\ProductController;
use App\Http\Controllers\Farmer\InquiryController;


Route::get('/', function () {
    return view('welcome');
});

// Farmer auth & dashboard routes
Route::prefix('farmer')->name('farmer.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth', \App\Http\Middleware\FarmerOnly::class])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('products', ProductController::class)->names('products');
    // Inquiries (Inbox)
    Route::get('inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
    Route::get('inquiries/{inquiry}', [InquiryController::class, 'show'])->name('inquiries.show');
    Route::patch('inquiries/{inquiry}/status', [InquiryController::class, 'updateStatus'])->name('inquiries.status');
    Route::post('inquiries/{inquiry}/reply', [InquiryController::class, 'reply'])->name('inquiries.reply');
    Route::get('inquiries-export', [InquiryController::class, 'export'])->name('inquiries.export');
    });
});
