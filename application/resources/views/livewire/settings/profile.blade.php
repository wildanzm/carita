<div class="space-y-6">
    <!-- Profile Information Card -->
    <div class="glassmorphism rounded-2xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-amber-600 to-amber-700 px-8 py-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        {{ __('Profile Information') }}
                    </h2>
                    <p class="text-amber-50 mt-2">{{ __('Update your name and email address') }}</p>
                </div>
                @if (!$editMode)
                    <button wire:click="enableEdit"
                        class="bg-white/20 hover:bg-white/30 text-white px-6 py-2 rounded-lg transition-all duration-300 flex items-center gap-2 backdrop-blur-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        {{ __('Edit') }}
                    </button>
                @endif
            </div>
        </div>

        <div class="p-8 bg-white/50">
            @if (!$editMode)
                <!-- View Mode -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('Name') }}</label>
                        <div class="bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-gray-900 font-medium">
                            {{ $name }}
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('Email') }}</label>
                        <div class="bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-gray-900 font-medium">
                            {{ $email }}
                        </div>
                    </div>

                    @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                        <div class="md:col-span-2 bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-yellow-500 mt-0.5 mr-2 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <p class="text-sm text-yellow-700">
                                        {{ __('Your email address is unverified.') }}
                                        <button wire:click.prevent="resendVerificationNotification"
                                            class="underline hover:text-yellow-900 font-semibold">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>
                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 text-sm text-green-700 font-medium">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @else
                <!-- Edit Mode -->
                <form wire:submit="updateProfileInformation" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">{{ __('Name') }}</label>
                            <input wire:model="name" type="text" required autofocus autocomplete="name"
                                class="w-full bg-white border border-gray-300 text-gray-900 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all" />
                            @error('name')
                                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">{{ __('Email') }}</label>
                            <input wire:model="email" type="email" required autocomplete="email"
                                class="w-full bg-white border border-gray-300 text-gray-900 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all" />
                            @error('email')
                                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-yellow-500 mt-0.5 mr-2 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <p class="text-sm text-yellow-700">
                                        {{ __('Your email address is unverified.') }}
                                        <button wire:click.prevent="resendVerificationNotification"
                                            class="underline hover:text-yellow-900 font-semibold">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>
                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 text-sm text-green-700 font-medium">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="flex items-center justify-between pt-4 border-t border-gray-300">
                        <button type="button" wire:click="cancelEdit"
                            class="px-6 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold rounded-lg transition-all duration-300 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            {{ __('Cancel') }}
                        </button>

                        <div class="flex items-center gap-4">
                            <x-action-message class="text-green-600 font-medium" on="profile-updated">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    {{ __('Saved successfully!') }}
                                </div>
                            </x-action-message>

                            <button type="submit"
                                class="px-6 py-2.5 bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 text-white font-semibold rounded-lg transition-all duration-300 flex items-center gap-2 shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                {{ __('Save Changes') }}
                            </button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
