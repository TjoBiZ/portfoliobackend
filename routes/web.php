<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\ProfileController;

use Illuminate\Http\Request;

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\SitemapController;

Route::get('/', function () {
    return view('portfolio');
});

Route::get('/video', function () {
    return view('video');
});

Route::post('/contact-form', function (Request $request) {
    Log::info('In route before calling controller');
    return app(ContactFormController::class)->sendMessage($request);
});

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
