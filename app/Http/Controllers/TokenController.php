<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TokenController extends Controller
{
    public function createToken(Request $request)
    {
        // Валидация входных данных
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Проверяем валидацию
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Управление лимитом токенов
            $tokens = $user->tokens;
            if ($tokens->count() >= 30) {
                $oldestToken = $tokens->sortBy('created_at')->first();
                $oldestToken->delete();
            }

            // Создание нового токена
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json(['token' => $token]);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function getTokenForAuthenticatedUser(Request $request)
    {
        $user = $request->user();
        $token = $user->createToken('API Token')->plainTextToken;
        $token_json = response()->json(['token' => $token]);

        //return $token_json; // Вывод токена в формате JSON без шаблона Blade

        // Передача данных в шаблон Blade
        return view('get-token', ['token' => $token_json]);
    }
}
