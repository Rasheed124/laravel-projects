<x-auth-layout title="Verify Email">
    <div class="max-w-sm mx-auto w-full px-4 py-8">

        <h1 class="text-3xl text-gray-800 dark:text-gray-100 font-bold mb-4">{{ __('Verify Email') }}</h1>
        
        <div class="mb-6 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-6 font-medium text-sm text-green-600 dark:text-green-400 border border-green-200 bg-green-50 p-3 rounded">
                {{ __('A new verification link has been sent to the email address you provided.') }}
            </div>
        @endif

        <div class="flex flex-col space-y-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn w-full bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                    {{ __('Resend Verification Email') }}
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="text-center">
                @csrf
                <button type="submit" class="text-sm underline text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>

    </div>
</x-auth-layout>