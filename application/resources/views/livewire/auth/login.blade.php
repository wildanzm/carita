<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <!-- Header -->
        <div class="mb-2">
            <h1 class="text-center text-3xl sm:text-4xl font-bold text-gray-900 mb-2">Login</h1>
            <p class="text-center text-sm sm:text-base text-gray-600">Masuk untuk mengakses Carita.
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-5">
            @csrf

            <!-- Email Address -->
            <div class="space-y-2">
                <flux:input name="email" type="email" required autofocus autocomplete="email"
                    placeholder="Masukan Email" class="w-full px-4 py-3 border-2 border-gray-300 rounded-full" />
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <flux:input name="password" type="password" required autocomplete="current-password"
                    placeholder="Masukan Password" class="w-full px-4 py-3 border-2 border-gray-300 rounded-full" />
            </div>

            <!-- Login Button -->
            <div class="mt-2">
                <flux:button variant="primary" type="submit"
                    class="w-full bg-linear-to-br from-amber-700 to-amber-600 px-8 py-2 text-white rounded-full shadow-md hover:shadow-lg transition-all duration-300"
                    data-test="login-button">
                    Login
                </flux:button>
            </div>
        </form>

        @if (Route::has('register'))
            <div class="text-center text-sm text-gray-600">
                <span>Belum Memiliki Akun? </span>
                <flux:link :href="route('register')" wire:navigate
                    class="text-orange-600 hover:text-orange-700 font-medium">
                    Daftar
                </flux:link>
            </div>
        @endif
    </div>
</x-layouts.auth>
