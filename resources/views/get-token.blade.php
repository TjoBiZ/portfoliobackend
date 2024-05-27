<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-100 leading-tight">
            {{ __('The token issued for the RESTful API using Laravel Sanctum and instructions on how to use it in Postman.') }}
        </h2>
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
