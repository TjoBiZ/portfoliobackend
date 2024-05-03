<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portfolio');
});

Route::get('/video', function () {
    return view('video');
});

Route::post('/contact-form', 'App\Http\Controllers\ContactFormController@store')->name('form.submit');

Route::get('/laravel', function () {
    return view('welcome');
});
