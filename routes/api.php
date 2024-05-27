<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Пример защищенного маршрута, доступного только для аутентифицированных пользователей
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/user/tokens', function (Request $request) {
        // Получаем токены пользователя и преобразуем их в массив
        $tokens = $request->user()->tokens->map(function ($token) {
            return [
                'id' => $token->id,
                'name' => $token->name,
                'abilities' => $token->abilities,
                'last_used_at' => $token->last_used_at,
                'created_at' => $token->created_at->toDateTimeString(),
                'updated_at' => $token->updated_at->toDateTimeString()
            ];
        });

        return response()->json($tokens);
    });

    Route::get('/ip2', function (Request $request) {
        return $request->ip();
    });

});

// Маршрут для аутентификации пользователя через API и выдачи токена для последующих запросов.
Route::post('/token/create', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('API Token')->plainTextToken;
        return response()->json(['token' => $token]);
    }
    return response()->json(['message' => 'Unauthorized'], 401);
})->name('api.token.create');


Route::get('/ip', function (Request $request) {
    return $request->ip();
});
