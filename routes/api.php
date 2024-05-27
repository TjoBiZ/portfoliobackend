<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;

// Пример защищенного маршрута, доступного только для аутентифицированных пользователей
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/user/tokens', [TokenController::class, 'listTokens']); // Список токенов пользователя, само собой без самих токенов, просто даты их запросов.
    Route::get('/ip2', function (Request $request) {
        return $request->ip();
    });
});



// Маршрут для аутентификации пользователя через API и выдачи токена для последующих запросов. Для POST запроса через POSTMAN или CURL
// необходимо в body добавить x-www-form-urlencoded и вписать email и password. В ответе будет выдан токен для дальнейших запросов и еще не забыть про поле _token из cookies - csrf токен. и поле remember со значением on.

// POSTMAN:
// POST http://localhost:8000/api/token/create
// x-www-form-urlencoded
// email:admin@admin
// password:admin
// _token:5V6toSUHwHnZfEzaM4KMs9lemDe67XcfBrs6OPck
// remember:on

Route::post('/token/create', [TokenController::class, 'createToken'])->name('api.token.create');


Route::get('/ip', function (Request $request) {
    return $request->ip();
});
