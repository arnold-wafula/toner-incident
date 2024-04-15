<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\approver\ApproverController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('admin');
    }
    else {
        return view('auth.login');
    }
});

Auth::routes();

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
});

Route::middleware(['approver'])->group(function() {
    Route::get('/incidents', [ApproverController::class, 'index'])->name('approver');

    // Route::post('/approve/{idIncidents}', [ApproverController::class, 'approve'])->name('approve');
    // Route::post('/reject/{idIncidents}', [ApproverController::class, 'reject'])->name('reject');

    Route::post('/approve', [ApproverController::class, 'approve'])->name('approve');
    Route::post('/reject', [ApproverController::class, 'reject'])->name('reject');

    Route::get('/salesorder/{idIncidents}', [ApproverController::class, 'salesOrder'])->name('salesorder');
});