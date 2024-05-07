<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactFormController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Валидация данных
//        $validatedData = $request->validate([
//            'name' => 'required|max:255',
//            'email' => 'required|email',
//        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        Log::info('This is a message log from client-side:' . ' Name: ' . $name . ' E-mail: ' . $email . ' Client message: ' . $message);
        // Создаем результирующий массив
        $result = [
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'server_message' => 'success',
            'status' => true
        ];

        // Return message to client-side
        return response()->json($result);
//        return view('submission_result', $result);
    }
}
