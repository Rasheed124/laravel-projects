<x-auth-layout title="Forgot Password">
    <div class="max-w-sm mx-auto w-full px-4 py-8">

        <h1 class="text-3xl text-gray-800 dark:text-gray-100 font-bold mb-2">Reset Password</h1>
        
        <div class="mb-6 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Forgot your password? No problem. Enter your email address and we will send you a reset link.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1" for="email">Email Address <span class="text-red-500">*</span></label>
                    <input id="email" name="email" class="form-input w-full @error('email') border-red-500 @enderror" 
                           type="email" value="{{ old('email') }}" required autofocus />
                    
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white whitespace-nowrap">
                    {{ __('Send Reset Link') }}
                </button>
            </div>
        </form>

        <div class="pt-5 mt-6 border-t border-gray-100 dark:border-gray-700/60">
            <div class="text-sm">
                Back to <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400"
                    href="{{ route('login') }}">Sign In</a>
            </div>
        </div>

    </div>
</x-auth-layout>