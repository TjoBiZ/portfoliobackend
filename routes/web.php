<?php

use App\Http\Controllers\Http\Controllers\Auth\Http\Controllers\Http\Controllers\ContactFormController;
use App\Http\Controllers\Http\Controllers\Auth\Http\Controllers\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Middleware\CustomEnsureEmailIsVerified;
use Illuminate\Support\Facades\Route;

// Группа маршрутов для домена solarneutrino.com
Route::domain('solarneutrino.com')->group(function () {
    Route::get('/', function () {
        return view('portfolio');
    });

    Route::get('/video', function () {
        return view('video');
    });

    Route::post('/contact-form', function (Request $request) {
        return app(ContactFormController::class)->sendMessage($request);
    });
});

// Группа маршрутов для админских поддоменов solarneutrino.com
Route::domain('admin.solarneutrino.com')->group(function () {
    Route::get('/laravel', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
});

// Группа маршрутов для домена portfolio.local
Route::domain('portfolio.local')->group(function () {
    Route::get('/', function () {
        return view('portfolio');
    });

    Route::get('/video', function () {
        return view('video');
    });

    Route::post('/contact-form', function (Request $request) {
        return app(ContactFormController::class)->sendMessage($request);
    });
});

Route::domain('admin.portfolio.local')->group(function () {
    Route::get('/laravel', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
});
