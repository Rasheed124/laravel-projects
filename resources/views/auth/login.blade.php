<x-auth-layout title="Login">
    <div class="max-w-sm mx-auto w-full px-4 py-8">

        <h1 class="text-3xl text-gray-800 dark:text-gray-100 font-bold mb-6">Welcome back!</h1>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1" for="email">Email Address</label>
                    <input id="email" name="email" class="form-input w-full @error('email') border-red-500 @enderror" 
                           type="email" value="{{ old('email') }}"  autofocus />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1" for="password">Password</label>
                    <input id="password" name="password" class="form-input w-full @error('password') border-red-500 @enderror" 
                           type="password"  autocomplete="current-password" />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="form-checkbox text-violet-500">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                <div class="mr-1">
                    @if (Route::has('password.request'))
                        <a class="text-sm underline hover:no-underline text-gray-600 dark:text-gray-400" 
                           href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>
                    @endif
                </div>
                
                <button type="submit" class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white ml-3">
                    Sign In
                </button>
            </div>
        </form>

        <div class="pt-5 mt-6 border-t border-gray-100 dark:border-gray-700/60">
            <div class="text-sm">
                Don’t you have an account? <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400"
                    href="{{ route('register') }}">Sign Up</a>
            </div>
        </div>

    </div>
</x-auth-layout>