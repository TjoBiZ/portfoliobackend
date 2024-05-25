<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactFormPost;

class ContactMessageController extends Controller
{
    public function index()
    {
        $posts = ContactFormPost::all(); // Извлечение всех записей
        return view('contact-messages', compact('posts')); // Передача данных в представление
    }
}
