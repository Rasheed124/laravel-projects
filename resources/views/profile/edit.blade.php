<x-app-layout title="Settings">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Account Settings</h1>
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
                            <section x-data="{ photoName: null, photoPreview: null }">
                                <div class="flex items-center">
                                    <div class="mr-4">
                                        <!-- Current Photo / Preview Photo -->
                                        <template x-if="! photoPreview">
                                            <img class="w-20 h-20 rounded-full object-cover"
                                                src="{{ $user->profileImageUrl() }}" alt="{{ $user->name }}" />
                                        </template>
                                        <template x-if="photoPreview">
                                            <img class="w-20 h-20 rounded-full object-cover" :src="photoPreview" />
                                        </template>
                                    </div>

                                    <label for="avatar-upload"
                                        class="cursor-pointer btn-sm dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300">
                                        Change
                                    </label>

                                    <input type="file" id="avatar-upload" name="profile_image" class="hidden"
                                        accept="image/*" x-ref="photo"
                                        x-on:change="
                                                photoName = $refs.photo.files[0].name;
                                                const reader = new FileReader();
                                                reader.onload = (e) => {
                                                    photoPreview = e.target.result;
                                                };
                                                reader.readAsDataURL($refs.photo.files[0]);
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

                                    <a href="{{ route('profile.edit') }}"
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
