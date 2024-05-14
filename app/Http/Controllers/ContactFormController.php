<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator; // Добавляем use для Validator
use App\Models\ContactFormPost;
use Illuminate\Support\Facades\Http;
use App\Mail\SendContactFormUserMessage;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function sendMessage(Request $request)
    {

        $secretKey = env('GOOGLE_RECAPTCHAR_V3_BACKEND');
        $responseKey = $_POST["recaptcha_response"];
        $userIP = $_SERVER['REMOTE_ADDR'];

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
        $response = file_get_contents($url);
        if ($response === false) {
            // Обработка случая, когда запрос к серверу Google reCaptcha V3 не удался
            $result = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'message' => $request->input('message'),
                'server_message' => 'success',
                'status' => false,
                'error' => 'Uh-oh, reCAPTCHA check didn\'t go through.',
                'server_message' => 'warning',
                'recaptcha_message' => 'Uh-oh, looks like Google Recaptcha anti-spam service is taking a siesta right now. Give me a holler using another way or try sending the message through the form again later, dude.',
                'recaptcha_status' => false
            ];
            return response()->json($result, 500);
        }

        $response = json_decode($response);

        $changeRequest = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000'
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        Log::info('This is a message log from client-side:' . ' Name: ' . $name . ' E-mail: ' . $email . ' Client score on Google reCAPTCHA V3 response: ' . $response->score . ' Client IP address: ' . $_SERVER["REMOTE_ADDR"] . ' | Client message: ' . $message);

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
        }

        if ($response->score >= 0.3) {             // User has been verified and passed the reCAPTCHA check!
            $contactFormPost = new ContactFormPost();
            $contactFormPost->name = $request->name;
            $contactFormPost->email = $request->email;
            $contactFormPost->message = $request->message;
            $contactFormPost->save();

            $telegram_token = env('TELEGRAM_BOT_TOKEN');
            $web_link_to_telegram = strtoupper(env('APP_URL'));;
            $text = <<<EOT
<b><i>MESSAGE FROM CONTACT FORM FROM $web_link_to_telegram</i></b>
<b>Name:</b> $request->name
<b>Email:</b> $request->email
<b>Message:</b> $request->message
<b>IP-адрес:</b> $userIP
EOT;
            $response = Http::get("https://api.telegram.org/bot{$telegram_token}/sendMessage", [
                'chat_id' => env('TELEGRAM_CHAT_ID'),
                'text' => $text,
                'parse_mode' => 'HTML'
            ]);

            Mail::to('j@solarneutrino.com')->send(new SendContactFormUserMessage($result['name'], $result['email'], $result['message'])); // Don't forget to make console command - FOR EXAMPLE: ubuntu@ip-172-31-16-20 ~: composer require aws/aws-sdk-php && composer dump-autoload


            $recaptcha_success = "Form sent!";
            $result['recaptcha_status'] = true;
             $result['recaptcha_message'] = $recaptcha_success;
            return response()->json($result);
        } else {
            $recaptcha_failure = "Oops, looks like you didn't pass the reCAPTCHA check. Looks like you didn't ace the SPAM check, and your message didn't go through. Bummer, dude. Try again later or reach out to me directly via phone or email. I might be able to find your message in the logs.";
            $result['recaptcha_status'] = false;
            $result['recaptcha_message'] = $recaptcha_failure;
            $result['server_message'] = 'warning';
            return response()->json($result);
        }

        // Создаем результирующий массив
        // Return message to client-side
        return response()->json($result);
//        return view('submission_result', $result);
    }
}
