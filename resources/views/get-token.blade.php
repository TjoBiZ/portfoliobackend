<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-100 leading-tight">
            {{ __('The token issued for the RESTful API using Laravel Sanctum and instructions on how to use it in Postman.') }}
        </h2>
        <hr>
        <br>
        <p class="flex justify-between items-center text-neutral-100 leading-tight">
            <span>{{ __('This technology is utilized for the exchange of authorized JSON API data between different systems, such as server-to-server, server-to-frontend SPAs using frameworks like Vue, React, Angular, etc., and server-to-mobile applications on iOS (Swift) and Android (Kotlin), among others. This document also includes instructions on how to use the token in Postman.') }}</span>
        </p>
        <span class="flex gap-2 justify-end">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/95/Vue.js_Logo_2.svg" alt="Vue.js Logo" style="max-height: 40px; max-width: 40px;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a7/React-icon.svg" alt="React Logo" style="max-height: 40px; max-width: 40px;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/c/cf/Angular_full_color_logo.svg" alt="Angular Logo" style="max-height: 40px; max-width: 40px;">
                <img src="https://www.svgrepo.com/show/452110/swift.svg" alt="Swift Logo" style="max-height: 40px; max-width: 40px;">
                <img src="https://www.svgrepo.com/show/303125/apple-logo.svg" alt="Apple Logo" style="max-height: 40px; max-width: 40px;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/06/Kotlin_Icon.svg" alt="Kotlin Logo" style="max-height: 40px; max-width: 40px;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/d/d7/Android_robot.svg" alt="Android Logo" style="max-height: 40px; max-width: 40px;">
            </span>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-neutral-300">
                    <h3 class="text-neutral-100 text-xl font-bold mb-4">{{ $token }}</h3>
                    <p class="text-neutral-400">This is a randomly generated token in your account that permits you to access the API. You can check it using POSTMAN, for example.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-neutral-300">
                    <p class="text-neutral-400">To start, you need to configure POSTMAN and ensure with a GET request to this route that everything is functioning correctly.</p>
                    <p class="text-neutral-400">https://solarneutrino.com/api/ip or     https://admin.solarneutrino.com/api/ip - This route works without token authorization, and if everything is set up correctly, you will see your IP address in the response body.</p>
                </div>
                <img src="images/tokens/01_Check_API_Connection.png" style="width: 100%;">
                <div class="p-6 text-neutral-300">
                    <p class="text-neutral-400">The next step is to obtain the token key issued by Laravel Sanctum. I have configured it so that you can simply copy it from the top of the instructions, which can only be done by authorized users on this page through the web interface of my application.</p>
                    <p class="text-neutral-400">If you want to test the POST request for generating the token via JSON with your login credentials, as is commonly done by SPAs on frameworks like Vue, React, Angular, etc., you can check this route as shown in the screenshot below. Don't forget to set all configurations as demonstrated in that screenshot.</p>
                    <p class="text-neutral-400">https://solarneutrino.com/api/token/create</p>
                    <p class="text-neutral-400">or</p>
                    <p class="text-neutral-400">https://admin.solarneutrino.com/api/token/create</p>
                    <p class="text-neutral-400"> You can choose between two options to obtain the key via a POST request. In the body setting, select x-www-form-urlencoded and enter the login and password where the key is "email" with the value "Your@email.com", and the second key is "password" with the value "Your password". Alternatively, you can choose raw -> JSON in the body settings and write according to this example: </p>
                    <code class="text-neutral-400">{
                            "email": "your@email.com",
                            "password": "Your Password"
                            }</code>
                </div>
                <img src="images/tokens/02_creat_API_token.png" style="width: 100%;">
                <div class="p-6 text-neutral-300">
                    <p class="text-neutral-400">To verify the token issued by Laravel Sanctum, I have prepared two API GET routes that are accessible only with the tokens. To do this, you need to enter the obtained token in the Headers tab. Where it says key, write "Authorization," and in the Value field, you need to paste the obtained token, but it is very important to prepend it with "Bearer " followed by a space. It should look something like "Bearer 1|qNBLVhsgD6jGO40q7Y2ZKWJ4iehCwLMq0UmIgqgu79a7fdad", where instead of 1|qNBLVhsgD6jGO40q7Y2ZKWJ4iehCwLMq0UmIgqgu79a7fdad you should insert your obtained token.</p>
                    <p class="text-neutral-400">After setting this up, you can access the link below to receive a response as shown in the screenshot. If everything is done correctly, you will see a JSON response similar to the one in the screenshot.</p>
                    <p class="text-neutral-400">https://admin.solarneutrino.com/api/user</p>
                </div>
                <img src="images/tokens/03_route_only_with_token.png" style="width: 100%;">
                <div class="p-6 text-neutral-300">Or, you need to check this address, which also operates only with token keys, unlike the first one used to verify the functioning of Postman. That is, the one without the number 2, also via a GET request.</p>
                    <p class="text-neutral-400">https://admin.solarneutrino.com/api/ip2</p>
                </div>
                <img src="images/tokens/04_route_only_with_token.png" style="width: 100%;">

            </div>
        </div>
    </div>
</x-app-layout>
