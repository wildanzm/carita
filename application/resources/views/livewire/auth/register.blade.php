<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <!-- Header -->
        <div class="mb-2">
            <h1 class="text-center text-3xl sm:text-4xl font-bold text-gray-900 mb-2">Daftar Akun</h1>
            <p class="text-center text-sm sm:text-base text-gray-600">Buat akun baru untuk mengakses Carita.</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-5">
            @csrf

            <!-- Name -->
            <div class="space-y-2">
                <flux:input name="name" type="text" required autofocus autocomplete="name"
                    placeholder="Nama Lengkap" class="w-full px-4 py-3 border-2 border-gray-300 rounded-full" />
            </div>

            <!-- Email Address -->
            <div class="space-y-2">
                <flux:input name="email" type="email" required autocomplete="email" placeholder="Johndoe@gmail.com"
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-full" />
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <flux:input name="password" type="password" required autocomplete="new-password"
                    placeholder="************" viewable
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-full" />
            </div>

            <!-- Confirm Password -->
            <div class="space-y-2">
                <flux:input name="password_confirmation" type="password" required autocomplete="new-password"
                    placeholder="Konfirmasi Password" viewable
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-full" />
            </div>

            <!-- Register Button -->
            <div class="mt-2">
                <flux:button variant="primary" type="submit"
                    class="w-full bg-linear-to-br from-amber-700 to-amber-600 px-8 py-2 text-white rounded-full shadow-md hover:shadow-lg transition-all duration-300">
                    Daftar
                </flux:button>
            </div>
        </form>

        <div class="text-center text-sm text-gray-600">
            <span>Sudah Memiliki Akun? </span>
            <flux:link :href="route('login')" wire:navigate class="text-orange-600 hover:text-orange-700 font-medium">
                Masuk
            </flux:link>
        </div>
    </div>
</x-layouts.auth>
