<x-app-layout title="Settings">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Account Settings</h1>
        </div>

        <!-- Global Notification Area -->
        <div class="mb-6">
            {{-- Success Messages --}}
            @if (session('status'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                    class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-200 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <div>
                        <span class="font-bold">Success!</span>
                        @if (session('status') === 'profile-updated')
                            Profile information updated.
                        @endif
                        @if (session('status') === 'password-updated')
                            Password changed successfully.
                        @endif
                    </div>
                </div>
            @endif

            {{-- Validation Error Summary --}}
            @if ($errors->any() || $errors->updatePassword->any())
                <div class="flex p-4 mb-4 text-sm text-red-800 border border-red-200 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9 5a1 1 0 1 1 2 0v4a1 1 0 1 1-2 0V5Zm1 10a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                    </svg>
                    <div>
                        <span class="font-bold">Please correct the following errors:</span>
                        <ul class="mt-1.5 ml-4 list-disc list-inside">
                            {{-- Profile Errors --}}
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            {{-- Password Bag Errors --}}
                            @foreach ($errors->updatePassword->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl mb-8">
            <div class="flex flex-col md:flex-row md:-mr-px">

                <!-- Sidebar -->
                @include('profile.partials.sidebar')

                <!-- Panel -->
                <div class="grow">
                    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <!-- Panel body -->
                        <div class="p-6 space-y-6">
                            <h2 class="text-2xl text-gray-800 dark:text-gray-100 font-bold mb-5">My Account</h2>

                            <!-- Profile Picture -->
                            <section x-data="{
                                photoPreview: null,
                                isDeleted: false,
                                currentPhoto: '{{ $user->profileImageUrl() }}',
                                defaultPhoto: '{{ asset('images/user-default.jpg') }}'
                            }">
                                <div class="flex items-center">
                                    <div class="mr-4">
                                        <!-- Image Display Logic -->
                                        <div class="relative w-20 h-20">
                                            <!-- 1. New Preview -->
                                            <template x-if="photoPreview">
                                                <img class="w-20 h-20 rounded-full object-cover"
                                                    :src="photoPreview" />
                                            </template>

                                            <!-- 2. Current Photo (if not deleted and no preview) -->
                                            <template x-if="!photoPreview && !isDeleted">
                                                <img class="w-20 h-20 rounded-full object-cover"
                                                    :src="currentPhoto" />
                                            </template>

                                            <!-- 3. Placeholder (if deleted and no preview) -->
                                            <template x-if="isDeleted && !photoPreview">
                                                <img class="w-20 h-20 rounded-full object-cover"
                                                    :src="defaultPhoto" />
                                            </template>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap gap-2">
                                        <!-- Change Button -->
                                        <label for="avatar-upload"
                                            class="cursor-pointer btn-sm dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300">
                                            Change
                                        </label>

                                        <!-- Remove Button: Always visible if there is an image to remove -->
                                        <button type="button"
                                            class="btn-sm bg-rose-100 text-rose-600 hover:bg-rose-200 border-transparent"
                                            x-on:click="
                                                    photoPreview = null; 
                                                    $refs.photo.value = null;
                                                    isDeleted = true;
                                                    $refs.clearInput.value = '1';
                                                ">
                                            Remove
                                        </button>
                                    </div>

                                    <!-- Hidden input to tell the backend to delete the file -->
                                    <input type="hidden" name="clear_profile_image" x-ref="clearInput" value="0">

                                    <input type="file" id="avatar-upload" name="profile_image" class="hidden"
                                        accept="image/*" x-ref="photo"
                                        x-on:change="
                                            if ($refs.photo.files.length > 0) {
                                                isDeleted = false;
                                                $refs.clearInput.value = '0';
                                                const reader = new FileReader();
                                                reader.onload = (e) => { photoPreview = e.target.result; };
                                                reader.readAsDataURL($refs.photo.files[0]);
                                            }
                                        ">
                                </div>
                                <x-input-error :messages="$errors->get('profile_image')" class="mt-2" />
                            </section>
                            <!-- Profile Information -->
                            <section>
                                <h3 class="text-xl leading-snug text-gray-800 dark:text-gray-100 font-bold mb-1">Profile
                                    Information</h3>
                                <div class="text-sm">Update your account's profile information and digital identity.
                                </div>

                                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                                    <div class="sm:w-1/3">
                                        <label class="block text-sm font-medium mb-1" for="name">Display
                                            Name</label>
                                        <input id="name" name="name" class="form-input w-full" type="text"
                                            value="{{ old('name', $user->name) }}" required />
                                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                                    </div>
                                    <div class="sm:w-1/3">
                                        <label class="block text-sm font-medium mb-1" for="city">City</label>
                                        <input id="city" name="city" class="form-input w-full" type="text"
                                            value="{{ old('city', $user->city) }}" />
                                        <x-input-error :messages="$errors->get('city')" class="mt-1" />
                                    </div>
                                    <div class="sm:w-1/3">
                                        <label class="block text-sm font-medium mb-1" for="country">Country</label>
                                        <input id="country" name="country" class="form-input w-full" type="text"
                                            value="{{ old('country', $user->country) }}" />
                                        <x-input-error :messages="$errors->get('country')" class="mt-1" />
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                                    <!-- Phone Number -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="phone">Phone
                                            Number</label>
                                        <input id="phone" name="phone" class="form-input w-full" type="tel"
                                            value="{{ old('phone', $user->phone) }}" placeholder="+1 (555) 000-0000" />
                                        <x-input-error :messages="$errors->get('phone')" class="mt-1" />
                                    </div>

                                    <!-- Personal/Company Website -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="website">Website</label>
                                        <div class="relative">
                                            <input id="website" name="social_links[website]"
                                                class="form-input w-full " type="text"
                                                value="{{ old('website', $user->website ?? '') }}"
                                                placeholder="https://www.yourwebsite.com" />

                                        </div>
                                        <x-input-error :messages="$errors->get('website')" class="mt-1" />
                                    </div>
                                </div>
                            </section>

                            <!-- Email -->
                            <section>
                                <h3 class="text-xl leading-snug text-gray-800 dark:text-gray-100 font-bold mb-1">Email
                                </h3>
                                <div class="text-sm">This is your primary contact email for login and notifications.
                                </div>
                                <div class="flex flex-wrap mt-5">
                                    <div class="mr-2">
                                        <label class="sr-only" for="email">Email</label>
                                        <input id="email" name="email" class="form-input" type="email"
                                            value="{{ old('email', $user->email) }}" required />
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-1" />
                            </section>

                            <!-- About Me -->
                            <section>
                                <h3 class="text-xl leading-snug text-gray-800 dark:text-gray-100 font-bold mb-1">About
                                    Me</h3>
                                <div class="text-sm">A brief description of yourself for your public profile.</div>
                                <div class="mt-5">
                                    <textarea id="about_me" name="about_me" class="form-input w-full" rows="3">{{ old('about_me', $user->about_me) }}</textarea>
                                </div>
                                <x-input-error :messages="$errors->get('about_me')" class="mt-1" />
                            </section>


                            <!-- Social Links -->
                            <!-- Social Links (JSON) -->
                            <section>
                                <h3 class="text-xl leading-snug text-gray-800 dark:text-gray-100 font-bold mb-1">Social
                                    Profiles</h3>
                                <div class="text-sm">Connect your social accounts for your public profile.</div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                                    <!-- Twitter -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="twitter">Twitter
                                            (X)</label>
                                        <input id="twitter" name="social_links[twitter]" class="form-input w-full"
                                            type="text"
                                            value="{{ old('social_links.twitter', $user->social_links['twitter'] ?? '') }}"
                                            placeholder="https://x.com/username" />
                                        <x-input-error :messages="$errors->get('social_links.twitter')" class="mt-1" />
                                    </div>

                                    <!-- Facebook -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="facebook">Facebook</label>
                                        <input id="facebook" name="social_links[facebook]" class="form-input w-full"
                                            type="text"
                                            value="{{ old('social_links.facebook', $user->social_links['facebook'] ?? '') }}"
                                            placeholder="https://facebook.com/username" />
                                        <x-input-error :messages="$errors->get('social_links.facebook')" class="mt-1" />
                                    </div>

                                    <!-- Instagram -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1"
                                            for="instagram">Instagram</label>
                                        <input id="instagram" name="social_links[instagram]"
                                            class="form-input w-full" type="text"
                                            value="{{ old('social_links.instagram', $user->social_links['instagram'] ?? '') }}"
                                            placeholder="https://instagram.com/username" />
                                        <x-input-error :messages="$errors->get('social_links.instagram')" class="mt-1" />
                                    </div>

                                    <!-- LinkedIn -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="linkedin">LinkedIn</label>
                                        <input id="linkedin" name="social_links[linkedin]" class="form-input w-full"
                                            type="text"
                                            value="{{ old('social_links.linkedin', $user->social_links['linkedin'] ?? '') }}"
                                            placeholder="https://linkedin.com/in/username" />
                                        <x-input-error :messages="$errors->get('social_links.linkedin')" class="mt-1" />
                                    </div>
                                </div>
                            </section>

                        </div>

                        <!-- Panel footer -->
                        <footer>
                            <div class="flex flex-col px-6 py-5 border-t border-gray-200 dark:border-gray-700/60">
                                <div class="flex self-end items-center">
                                    @if (session('status') === 'profile-updated')
                                        <span x-data="{ show: true }" x-show="show" x-transition
                                            x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-600 mr-3">
                                            Saved successfully.
                                        </span>
                                    @endif

                                    <a href="{{ route('dashboard') }}"
                                        class="btn dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300">Cancel</a>

                                    <button type="submit"
                                        class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white ml-3">
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </footer>
                    </form>


                    <div class="p-6 border-t border-gray-200 dark:border-gray-700/60">
                        @include('profile.partials.update-password-form')
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700/60">
                        @include('profile.partials.delete-user-form')
                    </div>




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
