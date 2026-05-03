<section>
    <header>
        <h3 class="text-xl leading-snug text-gray-800 dark:text-gray-100 font-bold mb-1">
            {{ __('Update Password') }}
        </h3>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-4">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="max-w-xl">
            <label class="block text-sm font-medium mb-1" for="update_password_current_password">
                {{ __('Current Password') }}
            </label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-input w-full"
                autocomplete="current-password" />
            @if ($errors->updatePassword->has('current_password'))
                <p class="text-xs text-red-500 mt-1">{{ $errors->updatePassword->first('current_password') }}</p>
            @endif
        </div>

        <!-- New Password -->
        <div class="max-w-xl">
            <label class="block text-sm font-medium mb-1" for="update_password_password">
                {{ __('New Password') }}
            </label>
            <input id="update_password_password" name="password" type="password" class="form-input w-full"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1" />
        </div>

        <!-- Confirm Password -->
        <div class="max-w-xl">
            <label class="block text-sm font-medium mb-1" for="update_password_password_confirmation">
                {{ __('Confirm Password') }}
            </label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-input w-full"
                autocomplete="new-password" />
            @if ($errors->updatePassword->has('password_confirmation'))
                <p class="text-xs text-red-500 mt-1">{{ $errors->updatePassword->first('password_confirmation') }}</p>
            @endif
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-4 pt-2">
            <button type="submit"
                class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                {{ __('Update Password') }}
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 dark:text-green-400 font-medium">{{ __('Saved successfully.') }}</p>
            @endif
        </div>
    </form>
</section>
