<div>
    <div class="glassmorphism rounded-2xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-amber-600 to-amber-700 px-8 py-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                        {{ __('Update Password') }}
                    </h2>
                    <p class="text-amber-50 mt-2">
                        {{ __('Ensure your account is using a long, random password to stay secure') }}</p>
                </div>
                @if (!$editMode)
                    <button wire:click="enableEdit"
                        class="bg-white/20 hover:bg-white/30 text-white px-6 py-2 rounded-lg transition-all duration-300 flex items-center gap-2 backdrop-blur-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        {{ __('Change Password') }}
                    </button>
                @endif
            </div>
        </div>

        <div class="p-8 bg-white/50">
            @if (!$editMode)
                <!-- View Mode -->
                <div class="text-center py-12">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ __('Password Protected') }}</h3>
                    <p class="text-gray-600 mb-6">
                        {{ __('Your password is secure. Click "Change Password" to update it.') }}</p>
                    <div class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-4 py-2 rounded-lg">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span
                            class="font-medium">{{ __('Last updated: ') }}{{ auth()->user()->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
        </div>
    @else
        <!-- Edit Mode -->
        <form method="POST" wire:submit="updatePassword" class="space-y-6">
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-blue-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div class="text-sm text-blue-700">
                        <p class="font-semibold mb-2">{{ __('Password Requirements:') }}</p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>{{ __('Minimum 8 characters') }}</li>
                            <li>{{ __('At least one uppercase and lowercase letter') }}</li>
                            <li>{{ __('At least one number') }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">{{ __('Current password') }}</label>
                    <input wire:model="current_password" type="password" required autocomplete="current-password"
                        class="w-full bg-white border border-gray-300 text-gray-900 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all" />
                    @error('current_password')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">{{ __('New password') }}</label>
                    <input wire:model="password" type="password" required autocomplete="new-password"
                        class="w-full bg-white border border-gray-300 text-gray-900 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all" />
                    @error('password')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">{{ __('Confirm Password') }}</label>
                    <input wire:model="password_confirmation" type="password" required autocomplete="new-password"
                        class="w-full bg-white border border-gray-300 text-gray-900 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all" />
                    @error('password_confirmation')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-300">
                <button type="button" wire:click="cancelEdit"
                    class="px-6 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold rounded-lg transition-all duration-300 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                    {{ __('Cancel') }}
                </button>

                <div class="flex items-center gap-4">
                    <x-action-message class="text-green-600 font-medium" on="password-updated">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            {{ __('Password updated successfully!') }}
                        </div>
                    </x-action-message>

                    <button type="submit"
                        class="px-6 py-2.5 bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 text-white font-semibold rounded-lg transition-all duration-300 flex items-center gap-2 shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        {{ __('Update Password') }}
                    </button>
                </div>
            </div>
        </form>
        @endif
    </div>
</div>
</div>
