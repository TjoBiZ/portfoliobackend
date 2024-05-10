<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactFormController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Валидация данных
        $validatedData =  $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string'
    ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        $result = [
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'server_message' => 'success',
            'status' => true
        ];

        if ($validatedData-> fails()) {
            $result['server_message'] = 'Backend validation error';
            return response()->json($result);
        }

        Log::info('This is a message log from client-side:' . ' Name: ' . $name . ' E-mail: ' . $email . ' Client message: ' . $message);
        // Создаем результирующий массив
        // Return message to client-side
        return response()->json($result);
//        return view('submission_result', $result);
    }
}
