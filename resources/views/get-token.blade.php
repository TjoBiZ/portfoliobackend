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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
