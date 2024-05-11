<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator; // Добавляем use для Validator

class ContactFormController extends Controller
{
    public function sendMessage(Request $request)
    {
        $changeRequest = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000'
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

        if ($validator->fails()) {
            // Получаем все сообщения об ошибках
            $errors = $validator->errors()->all();
            // Объединяем все сообщения об ошибках в одну строку
            $errorString = implode(' ', $errors);
            $result['server_message'] = 'danger';
            $result['status'] = false;
            $result['validator_message'] = $errorString;
            $result['errors'] = $validator->errors();
            return response()->json($result);
        }

        Log::info('This is a message log from client-side:' . ' Name: ' . $name . ' E-mail: ' . $email . ' Client message: ' . $message);
        // Создаем результирующий массив
        // Return message to client-side
        return response()->json($result);
//        return view('submission_result', $result);
    }
}
