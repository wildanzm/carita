<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <!-- Header -->
        <div class="mb-2">
            <h1 class="text-center text-3xl sm:text-4xl font-bold text-gray-900 mb-2">Buat Akun Baru</h1>
            <p class="text-center text-sm sm:text-base text-gray-600">Daftarkan diri Anda untuk mengakses fitur AI Story
                Generator dan manajemen produk budaya.</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-5">
            @csrf

            <!-- Name -->
            <div class="space-y-2">
                <flux:input name="name" type="text" required autofocus autocomplete="name"
                    placeholder="Nama Lengkap" class="w-full px-4 py-1 border-2 border-gray-300 rounded-full" />
                @error('name')
                    <p class="text-red-600 text-sm mt-1 px-4">{{ $message }}</p>
                @enderror
            </div>

            <!-- Username -->
            <div class="space-y-2">
                <flux:input name="username" type="text" required autocomplete="username" placeholder="Username"
                    class="w-full px-4 py-1 border-2 border-gray-300 rounded-full" />
                @error('username')
                    <p class="text-red-600 text-sm mt-1 px-4">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="space-y-2">
                <flux:input name="email" type="email" required autocomplete="email" placeholder="Masukan Email"
                    class="w-full px-4  border-2 border-gray-300 rounded-full py-1" />
                @error('email')
                    <p class="text-red-600 text-sm mt-1 px-4">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <flux:input name="password" type="password" required autocomplete="new-password"
                    placeholder="Masukan Password" class="w-full px-4  border-2 border-gray-300 rounded-full py-1" />
                @error('password')
                    <p class="text-red-600 text-sm mt-1 px-4">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="space-y-2">
                <flux:input name="password_confirmation" type="password" required autocomplete="new-password"
                    placeholder="Konfirmasi Password" class="w-full px-4  border-2 border-gray-300 rounded-full py-1" />
                @error('password_confirmation')
                    <p class="text-red-600 text-sm mt-1 px-4">{{ $message }}</p>
                @enderror
            </div>

            <!-- Register Button -->
            <div class="mt-2">
                <flux:button variant="primary" type="submit"
                    class="w-full bg-linear-to-br from-amber-700 to-amber-600 px-8 py-6 text-white rounded-full shadow-md hover:shadow-lg transition-all duration-300">
                    Daftar
                </flux:button>
            </div>
        </form>

        <div class="text-center text-sm text-gray-600">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-gray-500">atau</span>
                </div>
            </div>
            <span>Sudah Memiliki Akun? </span>
            <flux:link :href="route('login')" class="text-orange-600 hover:text-orange-700 font-medium">
                Masuk
            </flux:link>
        </div>
    </div>
</x-layouts.auth>
