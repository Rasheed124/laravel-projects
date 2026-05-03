<section>
    <header>
        <h3 class="text-xl leading-snug text-gray-800 dark:text-gray-100 font-bold mb-1">
            {{ __('Delete Account') }}
        </h3>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. This action cannot be undone.') }}
        </p>
    </header>

    <div class="mt-5">
        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            type="submit"
            class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white ml-3">
            {{ __('Delete Account') }}
        </button>

    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-2xl text-gray-800 dark:text-gray-100 font-bold mb-2">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">
                {{ __('Please enter your password to confirm you would like to permanently delete your account and all associated data.') }}
            </p>

            <div class="space-y-3">
                <label class="sr-only" for="password">{{ __('Password') }}</label>

                <input id="password" name="password" type="password" class="form-input w-full md:w-3/4"
                    placeholder="{{ __('Enter your password to confirm') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <button type="button"
                    class="btn dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300"
                    x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" class="btn bg-rose-500 hover:bg-rose-600 text-white ml-3">
                    {{ __('Permanently Delete') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
