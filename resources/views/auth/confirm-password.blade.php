<x-auth-layout title="Confirm Password">
    <div class="max-w-sm mx-auto w-full px-4 py-8">

        <h1 class="text-3xl text-gray-800 dark:text-gray-100 font-bold mb-2">{{ __('Confirm Password') }}</h1>
        
        <div class="mb-6 text-sm text-gray-600 dark:text-gray-400">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1" for="password">{{ __('Password') }}</label>
                    <input id="password" 
                           name="password" 
                           class="form-input w-full @error('password') border-red-500 @enderror" 
                           type="password" 
                           required 
                           autocomplete="current-password" 
                           autofocus />
                    
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white whitespace-nowrap">
                    {{ __('Confirm') }}
                </button>
            </div>
        </form>

        <div class="pt-5 mt-6 border-t border-gray-100 dark:border-gray-700/60">
            <div class="text-sm">
                {{ __('Need help?') }} 
                <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400" href="mailto:support@example.com">
                    {{ __('Contact Support') }}
                </a>
            </div>
        </div>

    </div>
</x-auth-layout>