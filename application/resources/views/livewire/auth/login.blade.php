<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <!-- Header with Icon -->
        <div class="mb-2 text-center">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-2">
                Selamat Datang Kembali
            </h1>
            <p class="text-sm sm:text-base text-gray-600">
                Masuk untuk mengakses 'Otak Budaya' dan <span class="font-semibold text-amber-700">'Mesin Cerita'
                    Anda.</span>
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-5">
            @csrf

            <!-- Email Address -->
            <div class="space-y-2">
                <label class="block text-lg font-medium text-gray-700 mb-2">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                            </path>
                        </svg>
                    </div>
                    <flux:input name="email" type="email" required autofocus autocomplete="email"
                        placeholder="nama@email.com"
                        class="w-full pl-12 pr-4 py-1 border-2 border-amber-500 rounded-full focus:outline-none focus:ring-0 transition-all" />
                </div>
                @error('email')
                    <p class="text-red-600 text-sm mt-1 px-4">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <label class="block text-lg font-medium text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <flux:input name="password" type="password" required autocomplete="current-password"
                        placeholder="Masukkan password Anda"
                        class="w-full pl-12 pr-4 py-1 border-2 border-amber-500 rounded-full focus:outline-none focus:ring-0 transition-all" />
                </div>
                @error('password')
                    <p class="text-red-600 text-sm mt-1 px-4">{{ $message }}</p>
                @enderror
            </div>

            <!-- Login Button -->
            <div class="mt-4">
                <flux:button variant="primary" type="submit"
                    class="w-full bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 py-6 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02]"
                    data-test="login-button">
                    <span class="flex items-center justify-center gap-2">
                        <span class="text-md">Masuk</span>
                    </span>
                </flux:button>
            </div>
        </form>

        @if (Route::has('register'))
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-gray-500">atau</span>
                </div>
            </div>

            <div class="text-center">
                <p class="text-sm text-gray-600 mb-3">
                    Belum punya akun?
                    <flux:link :href="route('register')" class="text-orange-600 hover:text-orange-700 font-medium">
                        Daftar Sekarang
                    </flux:link>
                </p>
            </div>
        @endif
    </div>
</x-layouts.auth>
