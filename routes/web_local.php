<?php

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;
use App\Http\Controllers\TokenController;

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

    Route::get('/contact-messages', [ContactMessageController::class, 'index'])->middleware(['auth', 'verified', RoleMiddleware::class . ':superadmin'])->name('contact-messages');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
});

Route::middleware('auth')->get('/get-token', [TokenController::class, 'getTokenForAuthenticatedUser'])->name('get-token');
