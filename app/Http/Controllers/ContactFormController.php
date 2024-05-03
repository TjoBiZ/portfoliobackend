<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function store(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
        ]);

        // Обработка данных
        // Например, сохранение в базу данных

        return response()->json(['success' => 'Данные успешно отправлены']);
    }
}
