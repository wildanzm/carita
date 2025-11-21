<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body>
    <nav
        class="flex justify-between items-center py-7 px-[5%] lg:px-[10%] text-gray-800 fixed top-0 left-0 right-0 z-50 backdrop-blur-md">
        <!-- Logo -->
        <h1 class="font-bold text-amber-700 text-2xl lg:text-3xl">Carita</h1>

        <!-- Desktop Menu -->
        <ul class="hidden lg:flex gap-5 items-center font-semibold">
            <li class="group relative"><a href="{{ route('home') }}" wire:navigate
                    class="hover:text-amber-700">Beranda</a><span
                    class="absolute -bottom-1 left-1/2 w-0 transition-all duration-500 h-0.5 bg-amber-700 group-hover:w-3/6"></span>
                <span
                    class="absolute -bottom-1 right-1/2 w-0 transition-all duration-500 h-0.5 bg-amber-700 group-hover:w-3/6"></span>
            </li>
            <li class="group relative"><a href="#" wire:navigate class="hover:text-amber-700">Explorasi Budaya</a>
                <span
                    class="absolute -bottom-1 left-1/2 w-0 transition-all duration-500 h-0.5 bg-amber-700 group-hover:w-3/6"></span>
                <span
                    class="absolute -bottom-1 right-1/2 w-0 transition-all duration-500 h-0.5 bg-amber-700 group-hover:w-3/6"></span>
            </li>
            <li class="group relative"><a href="#" wire:navigate class="hover:text-amber-700">Tentang Carita</a>
                <span
                    class="absolute -bottom-1 left-1/2 w-0 transition-all duration-500 h-0.5 bg-amber-700 group-hover:w-3/6"></span>
                <span
                    class="absolute -bottom-1 right-1/2 w-0 transition-all duration-500 h-0.5 bg-amber-700 group-hover:w-3/6"></span>
            </li>
            <li class="group relative"><a href="#" wire:navigate class="hover:text-amber-700">Untuk Perajin</a>
                <span
                    class="absolute -bottom-1 left-1/2 w-0 transition-all duration-500 h-0.5 bg-amber-700 group-hover:w-3/6"></span>
                <span
                    class="absolute -bottom-1 right-1/2 w-0 transition-all duration-500 h-0.5 bg-amber-700 group-hover:w-3/6"></span>
            </li>
        </ul>

        <!-- Desktop Auth Buttons -->
        <div class="hidden lg:flex gap-3">
            @if (Route::has('login'))
                @auth
                    <!-- User Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center gap-3 px-4 py-2 rounded-full transition-all duration-300">
                            <!-- Profile Icon -->
                            <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M12 2C9.38 2 7.25 4.13 7.25 6.75C7.25 9.32 9.26 11.4 11.88 11.49C11.96 11.48 12.04 11.48 12.1 11.49C12.12 11.49 12.13 11.49 12.15 11.49C12.16 11.49 12.16 11.49 12.17 11.49C14.73 11.4 16.74 9.32 16.75 6.75C16.75 4.13 14.62 2 12 2Z"
                                    fill="#b45309"></path>
                                <path
                                    d="M17.0809 14.1499C14.2909 12.2899 9.74094 12.2899 6.93094 14.1499C5.66094 14.9999 4.96094 16.1499 4.96094 17.3799C4.96094 18.6099 5.66094 19.7499 6.92094 20.5899C8.32094 21.5299 10.1609 21.9999 12.0009 21.9999C13.8409 21.9999 15.6809 21.5299 17.0809 20.5899C18.3409 19.7399 19.0409 18.5999 19.0409 17.3599C19.0309 16.1299 18.3409 14.9899 17.0809 14.1499Z"
                                    fill="#b45309"></path>
                            </svg>
                            <!-- User Name -->
                            <span class="font-semibold text-gray-800 text-lg">Halo,
                                {{ explode(' ', auth()->user()->name)[0] }}</span>
                        </button>

                        <!-- Dropdown Menu -->
                        <div
                            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 border border-gray-100">
                            <div class="py-2">
                                <a href="{{ url('/dashboard') }}" wire:navigate
                                    class="block px-4 py-2 text-gray-800 hover:bg-amber-50 hover:text-amber-700 transition-colors duration-200">
                                    Dashboard
                                </a>
                                <a href="#" wire:navigate
                                    class="block px-4 py-2 text-gray-800 hover:bg-amber-50 hover:text-amber-700 transition-colors duration-200">
                                    Profil
                                </a>
                                <a href="#" wire:navigate
                                    class="block px-4 py-2 text-gray-800 hover:bg-amber-50 hover:text-amber-700 transition-colors duration-200">
                                    Pengaturan
                                </a>
                                <div class="border-t border-gray-100 my-2"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 transition-colors duration-200">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" wire:navigate
                        class="bg-linear-to-br from-amber-700 to-amber-600 px-8 py-2 text-white rounded-full shadow-md hover:shadow-lg transition-all duration-300">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" wire:navigate
                            class="border border-amber-700 shadow-md px-8 py-2 text-amber-700 rounded-full hover:bg-amber-700 hover:text-white transition-all duration-300">Register</a>
                    @endif
                @endauth
            @endif
        </div>

        <!-- Hamburger Button -->
        <button id="menu-btn" class="lg:hidden block hamburger focus:outline-none z-50">
            <span class="hamburger-top"></span>
            <span class="hamburger-middle"></span>
            <span class="hamburger-bottom"></span>
        </button>

        <!-- Mobile Menu -->
        <div id="mobile-menu"
            class="mobile-menu lg:hidden bg-white shadow-lg px-[5%] pb-5 fixed left-0 right-0 z-40 top-[88px] rounded-b-2xl">
            <ul class="flex flex-col gap-4 font-semibold text-gray-800 mb-5 pt-4">
                <li class="border-b border-gray-200 pb-2">
                    <a href="{{ route('home') }}" wire:navigate
                        class="block hover:text-amber-700 transition-colors duration-300">Beranda</a>
                </li>
                <li class="border-b border-gray-200 pb-2">
                    <a href="#" wire:navigate
                        class="block hover:text-amber-700 transition-colors duration-300">Explorasi
                        Budaya</a>
                </li>
                <li class="border-b border-gray-200 pb-2">
                    <a href="#" wire:navigate
                        class="block hover:text-amber-700 transition-colors duration-300">Tentang
                        Carita</a>
                </li>
                <li class="border-b border-gray-200 pb-2">
                    <a href="#" wire:navigate
                        class="block hover:text-amber-700 transition-colors duration-300">Untuk
                        Perajin</a>
                </li>
            </ul>

            <!-- Mobile Auth Buttons -->
            <div class="flex flex-col gap-3">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" wire:navigate
                            class="bg-amber-700 text-white px-8 py-2 rounded-full shadow-md text-center hover:bg-amber-800 transition-all duration-300">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" wire:navigate
                            class="bg-linear-to-br from-amber-700 to-amber-600 px-8 py-2 text-white rounded-full shadow-md text-center hover:shadow-lg transition-all duration-300">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" wire:navigate
                                class="border border-amber-700 shadow-md px-8 py-2 text-amber-700 rounded-full text-center hover:bg-amber-700 hover:text-white transition-all duration-300">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    {{ $slot }}

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300">
        <!-- Main Footer -->
        <div class="px-[5%] lg:px-[10%] py-12 lg:py-16">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
                    <!-- Brand Section -->
                    <div class="space-y-4">
                        <h3 class="text-2xl lg:text-3xl font-bold text-amber-500">Carita</h3>
                        <p class="text-gray-400 text-sm lg:text-base leading-relaxed">
                            Platform AI yang menghubungkan budaya lokal dengan teknologi modern untuk melestarikan
                            warisan Indonesia.
                        </p>
                        <!-- Social Media -->
                        <div class="flex gap-4 pt-2">
                            <a href="#"
                                class="w-10 h-10 bg-gray-800 hover:bg-amber-700 rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-gray-800 hover:bg-amber-700 rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-gray-800 hover:bg-amber-700 rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-gray-800 hover:bg-amber-700 rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h4 class="text-white font-semibold text-lg mb-4">Navigasi</h4>
                        <ul class="space-y-3">
                            <li><a href="{{ route('home') }}" wire:navigate
                                    class="hover:text-amber-500 transition-colors duration-300 text-sm lg:text-base">Beranda</a>
                            </li>
                            <li><a href="#" wire:navigate
                                    class="hover:text-amber-500 transition-colors duration-300 text-sm lg:text-base">Eksplorasi
                                    Budaya</a></li>
                            <li><a href="#" wire:navigate
                                    class="hover:text-amber-500 transition-colors duration-300 text-sm lg:text-base">Tentang
                                    Carita</a></li>
                            <li><a href="#" wire:navigate
                                    class="hover:text-amber-500 transition-colors duration-300 text-sm lg:text-base">Untuk
                                    Perajin</a></li>
                        </ul>
                    </div>

                    <!-- Resources -->
                    <div>
                        <h4 class="text-white font-semibold text-lg mb-4">Sumber Daya</h4>
                        <ul class="space-y-3">
                            <li><a href="#"
                                    class="hover:text-amber-500 transition-colors duration-300 text-sm lg:text-base">Blog</a>
                            </li>
                            <li><a href="#"
                                    class="hover:text-amber-500 transition-colors duration-300 text-sm lg:text-base">Galeri
                                    Motif</a></li>
                            <li><a href="#"
                                    class="hover:text-amber-500 transition-colors duration-300 text-sm lg:text-base">Dokumentasi
                                    API</a></li>
                            <li><a href="#"
                                    class="hover:text-amber-500 transition-colors duration-300 text-sm lg:text-base">Bantuan</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div>
                        <h4 class="text-white font-semibold text-lg mb-4">Kontak</h4>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-amber-500 mt-0.5 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="text-sm lg:text-base">Majalengka, Jawa Barat, Indonesia</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-amber-500 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span class="text-sm lg:text-base">info@carita.id</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-amber-500 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                                <span class="text-sm lg:text-base">+62 812-3456-7890</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-gray-800 px-[5%] lg:px-[10%] py-6">
            <div
                class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-400">
                <p>&copy; 2025 Carita. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-amber-500 transition-colors duration-300">Kebijakan
                        Privasi</a>
                    <a href="#" class="hover:text-amber-500 transition-colors duration-300">Syarat &
                        Ketentuan</a>
                    <a href="#" class="hover:text-amber-500 transition-colors duration-300">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>
    @fluxScripts
</body>

</html>
