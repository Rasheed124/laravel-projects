<x-auth-layout title="Reset Password">
    <div class="max-w-sm mx-auto w-full px-4 py-8">

        <h1 class="text-3xl text-gray-800 dark:text-gray-100 font-bold mb-6">{{ __('Reset Password') }}</h1>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1" for="email">{{ __('Email Address') }}</label>
                    <input id="email" name="email"
                        class="form-input w-full @error('email') border-red-500 @enderror" type="email"
                        value="{{ old('email', $request->email) }}" required readonly />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1" for="password">{{ __('New Password') }}</label>
                    <input id="password" name="password"
                        class="form-input w-full @error('password') border-red-500 @enderror" type="password" required
                        autocomplete="new-password" autofocus />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1"
                        for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" name="password_confirmation" class="form-input w-full"
                        type="password" required autocomplete="new-password" />
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white whitespace-nowrap">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>

    </div>
</x-auth-layout>
