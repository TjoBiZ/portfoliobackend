<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

use App\Http\Controllers\ContactFormController;

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
