<x-guest-layout>
    <div class="mb-4 text-sm text-neutral-300">
        @if(session('email_verification'))
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another. ') }} {{ 'Check your email in SPAM folder if you do not find it in your inbox. Your email address is ' . session('email_verification') }}
        @else
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another. Check your email in SPAM folder if you do not find it in your inbox.') }}
        @endif
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            @if(session('email_verification'))
                {{ __('A new verification link has been sent to the email address you provided during registration.') }} {{ 'Check your email in SPAM folder if you do not find it in your inbox. Your email address is: ' . session('email_verification') }}
            @else
                {{ __('A new verification link has been sent to the email address you provided during registration. Check your email in SPAM folder if you do not find it in your inbox.') }}
            @endif
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-neutral-300 hover:text-neutral-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
