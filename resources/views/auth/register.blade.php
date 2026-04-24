<x-auth-layout title="Register">
    <div class="max-w-sm mx-auto w-full px-4 py-8">
        <h1 class="text-3xl text-gray-800 dark:text-gray-100 font-bold mb-6">Create your Account</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1" for="name">
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <input id="name" name="name" class="form-input w-full @error('name') border-red-500 @enderror" 
                           type="text" value="{{ old('name') }}"  autofocus />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1" for="email">
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <input id="email" name="email" class="form-input w-full @error('email') border-red-500 @enderror" 
                           type="email" value="{{ old('email') }}"  />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1" for="password">Password <span class="text-red-500">*</span></label>
                    <input id="password" name="password" class="form-input w-full @error('password') border-red-500 @enderror" 
                           type="password"  autocomplete="new-password" />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1" for="password_confirmation">Confirm Password <span class="text-red-500">*</span></label>
                    <input id="password_confirmation" name="password_confirmation" class="form-input w-full" 
                           type="password"  />
                </div>
            </div>

            <div class="flex items-center justify-between mt-6">
                <div class="mr-1">
                    <label class="flex items-center">
                        <input type="checkbox" name="newsletter" class="form-checkbox" />
                        <span class="text-sm ml-2">Email me about product news.</span>
                    </label>
                </div>
                
                <button type="submit" class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white ml-3 whitespace-nowrap">
                    Sign Up
                </button>
            </div>
        </form>

        <div class="pt-5 mt-6 border-t border-gray-100 dark:border-gray-700/60">
            <div class="text-sm">
                Have an account? <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400"
                    href="{{ route('login') }}">Sign In</a>
            </div>
        </div>
    </div>
</x-auth-layout>