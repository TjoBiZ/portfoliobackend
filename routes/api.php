<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Пример защищенного маршрута, доступного только для аутентифицированных пользователей
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/user/profile', function (Request $request) {
        // Предполагаем, что у пользователя есть метод profile, который возвращает профиль
        return $request->user()->profile;
    });
});

// Создание API токена для аутентифицированного пользователя
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
    return ['token' => $token->plainTextToken];
})->middleware('auth:sanctum');
