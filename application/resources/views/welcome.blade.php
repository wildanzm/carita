<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Carita</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <nav
        class="flex justify-between items-center py-7 px-[5%] lg:px-[10%] text-gray-800 fixed top-0 left-0 right-0 z-50 backdrop-blur-md">
        <!-- Logo -->
        <h1 class="font-bold text-amber-700 text-2xl lg:text-3xl">Carita</h1>

        <!-- Desktop Menu -->
        <ul class="hidden lg:flex gap-5 items-center font-semibold">
            <li class="group relative"><a href="" class="hover:text-amber-700">Beranda</a><span
                    class="absolute -bottom-1 left-1/2 w-0 transition-all duration-500 h-0.5 bg-amber-700 group-hover:w-3/6"></span>
                <span
                    class="absolute -bottom-1 right-1/2 w-0 transition-all duration-500 h-0.5 bg-amber-700 group-hover:w-3/6"></span>
            </li>
            <li class="group relative"><a href="">Explorasi Budaya</a> <span
                    class="absolute -bottom-1 left-1/2 w-0 transition-all duration-500 h-0.5 bg-amber-700 group-hover:w-3/6"></span>
                <span
                    class="absolute -bottom-1 right-1/2 w-0 transition-all duration-500 h-0.5 bg-amber-700 group-hover:w-3/6"></span>
            </li>
            <li class="group relative"><a href="">Tentang Carita</a> <span
                    class="absolute -bottom-1 left-1/2 w-0 transition-all duration-500 h-0.5 bg-amber-700 group-hover:w-3/6"></span>
                <span
                    class="absolute -bottom-1 right-1/2 w-0 transition-all duration-500 h-0.5 bg-amber-700 group-hover:w-3/6"></span>
            </li>
            <li class="group relative"><a href="">Untuk Perajin</a> <span
                    class="absolute -bottom-1 left-1/2 w-0 transition-all duration-500 h-0.5 bg-amber-700 group-hover:w-3/6"></span>
                <span
                    class="absolute -bottom-1 right-1/2 w-0 transition-all duration-500 h-0.5 bg-amber-700 group-hover:w-3/6"></span>
            </li>
        </ul>

        <!-- Desktop Auth Buttons -->
        <div class="hidden lg:flex gap-3">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="bg-amber-700 text-white px-8 py-2 rounded-full shadow-md hover:bg-amber-800 transition-all duration-300">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-linear-to-br from-amber-700 to-amber-600 px-8 py-2 text-white rounded-full shadow-md hover:shadow-lg transition-all duration-300">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
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
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu"
        class="mobile-menu lg:hidden bg-white shadow-lg px-[5%] pb-5 fixed left-0 right-0 z-40 top-[88px] rounded-b-2xl">
        <ul class="flex flex-col gap-4 font-semibold text-gray-800 mb-5 pt-4">
            <li class="border-b border-gray-200 pb-2">
                <a href="" class="block hover:text-amber-700 transition-colors duration-300">Beranda</a>
            </li>
            <li class="border-b border-gray-200 pb-2">
                <a href="" class="block hover:text-amber-700 transition-colors duration-300">Explorasi Budaya</a>
            </li>
            <li class="border-b border-gray-200 pb-2">
                <a href="" class="block hover:text-amber-700 transition-colors duration-300">Tentang Carita</a>
            </li>
            <li class="border-b border-gray-200 pb-2">
                <a href="" class="block hover:text-amber-700 transition-colors duration-300">Untuk Perajin</a>
            </li>
        </ul>

        <!-- Mobile Auth Buttons -->
        <div class="flex flex-col gap-3">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="bg-amber-700 text-white px-8 py-2 rounded-full shadow-md text-center hover:bg-amber-800 transition-all duration-300">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-linear-to-br from-amber-700 to-amber-600 px-8 py-2 text-white rounded-full shadow-md text-center hover:shadow-lg transition-all duration-300">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="border border-amber-700 shadow-md px-8 py-2 text-amber-700 rounded-full text-center hover:bg-amber-700 hover:text-white transition-all duration-300">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center px-[5%] lg:px-[10%] pt-24 lg:pt-0 overflow-hidden"
        style="background-image: url('/bg.svg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <!-- Decorative Background Elements -->
        <div class="decorative-circle w-96 h-96 -top-48 -right-48 absolute"></div>
        <div class="decorative-circle w-80 h-80 -bottom-40 -left-40 absolute"></div>

        <div
            class="flex flex-col lg:flex-row justify-between items-center w-full gap-12 lg:gap-16 py-10 lg:py-0 relative z-10">
            <!-- Text Content -->
            <div class="w-full lg:w-1/2 space-y-5 fade-in-up">
                <div
                    class="inline-flex items-center gap-2 text-amber-800 bg-amber-100 rounded-full px-3 py-1 text-sm lg:text-base border border-amber-300 shadow-lg">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <span class="font-medium">Cultural AI & Identity-Telling Assistant</span>
                </div>

                <h1 class="font-bold text-amber-700 text-4xl sm:text-5xl lg:text-6xl leading-16">
                    CARITA: <br class="hidden sm:block"><span class="text-gray-800">Otak Budaya, Mesin Cerita.</span>
                </h1>

                <p class="text-gray-700 text-lg leading-relaxed">
                    AI berbasis riset budaya yang mengubah karya lokal Majalengka menjadi narasi autentik dan
                    melestarikan warisan budaya Indonesia.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="#"
                        class="inline-flex items-center justify-center gap-2 bg-amber-700 hover:bg-amber-800 text-white py-4 px-8 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 font-semibold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                            </path>
                        </svg>
                        Coba Deteksi Motif
                    </a>
                    <a href="#"
                        class="inline-flex items-center justify-center gap-2 border-2 border-amber-700 text-amber-700 hover:bg-amber-700 hover:text-white py-4 px-8 rounded-full shadow-md hover:shadow-lg transition-all duration-300 font-semibold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Lihat Demo
                    </a>
                </div>
            </div>

            <!-- Enhanced Images Grid -->
            <div class="w-full lg:w-1/2 flex justify-center lg:justify-end scale-in">
                <div class="relative hero-image-stack w-full max-w-[500px] h-[400px] sm:h-[500px]">
                    <!-- Background decorative pattern -->
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-amber-100/30 to-orange-100/30 rounded-3xl blur-3xl">
                    </div>

                    <!-- Main Center Large Image -->
                    <div
                        class="hero-image absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[280px] sm:w-[320px] h-[320px] sm:h-[380px] z-20 float-animation">
                        <div
                            class="w-full h-full rounded-3xl overflow-hidden shadow-[0_25px_50px_rgba(0,0,0,0.25)] border-4 border-white bg-white">
                            <img src="/img/batik2.jpeg" alt="Motif batik utama" class="w-full h-full object-cover" />
                        </div>
                    </div>

                    <!-- Top Left Small Image -->
                    <div
                        class="hero-image absolute top-0 left-0 w-[120px] sm:w-[140px] h-[140px] sm:h-[160px] z-10 float-animation-delayed">
                        <div
                            class="w-full h-full rounded-2xl overflow-hidden shadow-[0_20px_40px_rgba(0,0,0,0.2)] border-3 border-white bg-white transform rotate-[-8deg]">
                            <img src="/img/batik1.webp" alt="Detail batik" class="w-full h-full object-cover" />
                        </div>
                    </div>

                    <!-- Top Right Small Image -->
                    <div
                        class="hero-image absolute top-8 right-0 w-[120px] sm:w-[140px] h-[140px] sm:h-[160px] z-10 float-animation-delayed-2">
                        <div
                            class="w-full h-full rounded-2xl overflow-hidden shadow-[0_20px_40px_rgba(0,0,0,0.2)] border-3 border-white bg-white transform rotate-[8deg]">
                            <img src="/img/batik4.jpg" alt="Proses membatik" class="w-full h-full object-cover" />
                        </div>
                    </div>

                    <!-- Bottom Left Small Image -->
                    <div
                        class="hero-image absolute bottom-8 left-4 w-[120px] sm:w-[140px] h-[140px] sm:h-[160px] z-10 float-animation">
                        <div
                            class="w-full h-full rounded-2xl overflow-hidden shadow-[0_20px_40px_rgba(0,0,0,0.2)] border-3 border-white bg-white transform rotate-[6deg]">
                            <img src="/img/batik3.webp" alt="Koleksi batik" class="w-full h-full object-cover" />
                        </div>
                    </div>

                    <!-- Bottom Right Small Image -->
                    <div
                        class="hero-image absolute bottom-0 right-4 w-[120px] sm:w-[140px] h-[140px] sm:h-[160px] z-10 float-animation-delayed">
                        <div
                            class="w-full h-full rounded-2xl overflow-hidden shadow-[0_20px_40px_rgba(0,0,0,0.2)] border-3 border-white bg-white transform rotate-[-6deg]">
                            <img src="/img/batik5.png" alt="Batik Majalengka" class="w-full h-full object-cover" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 lg:py-24 px-[5%] lg:px-[10%] bg-white">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-12 lg:mb-16 fade-in-up">
                <h2 class="text-3xl lg:text-4xl xl:text-5xl font-bold text-gray-800 mb-4">
                    Kenapa Memilih <span class="text-amber-700">Carita?</span>
                </h2>
                <p class="text-gray-600 text-base lg:text-lg max-w-2xl mx-auto">
                    Platform AI yang menghubungkan budaya lokal dengan teknologi modern untuk melestarikan warisan
                    Indonesia.
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                <!-- Feature 1 -->
                <div
                    class="bg-gradient-to-br from-amber-50 to-white p-6 lg:p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-amber-100 fade-in-up">
                    <div
                        class="w-12 h-12 lg:w-14 lg:h-14 bg-amber-700 rounded-xl flex items-center justify-center mb-4 lg:mb-5">
                        <svg class="w-6 h-6 lg:w-7 lg:h-7 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl lg:text-2xl font-bold text-gray-800 mb-3">Deteksi Motif AI</h3>
                    <p class="text-gray-600 text-sm lg:text-base">
                        Teknologi AI canggih yang dapat mengenali dan mengidentifikasi motif batik Majalengka dengan
                        akurat.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-gradient-to-br from-amber-50 to-white p-6 lg:p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-amber-100 fade-in-up"
                    style="transition-delay: 0.1s;">
                    <div
                        class="w-12 h-12 lg:w-14 lg:h-14 bg-amber-700 rounded-xl flex items-center justify-center mb-4 lg:mb-5">
                        <svg class="w-6 h-6 lg:w-7 lg:h-7 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl lg:text-2xl font-bold text-gray-800 mb-3">Narasi Autentik</h3>
                    <p class="text-gray-600 text-sm lg:text-base">
                        Cerita budaya yang kaya dan mendalam berdasarkan riset komprehensif tentang setiap motif.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-gradient-to-br from-amber-50 to-white p-6 lg:p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-amber-100 fade-in-up"
                    style="transition-delay: 0.2s;">
                    <div
                        class="w-12 h-12 lg:w-14 lg:h-14 bg-amber-700 rounded-xl flex items-center justify-center mb-4 lg:mb-5">
                        <svg class="w-6 h-6 lg:w-7 lg:h-7 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl lg:text-2xl font-bold text-gray-800 mb-3">Dukungan Perajin</h3>
                    <p class="text-gray-600 text-sm lg:text-base">
                        Platform untuk perajin batik memamerkan karya dan terhubung langsung dengan pembeli.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-16 lg:py-24 px-[5%] lg:px-[10%] bg-gradient-to-b from-white to-amber-50">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-12 lg:mb-16 fade-in-up">
                <h2 class="text-3xl lg:text-4xl xl:text-5xl font-bold text-gray-800 mb-4">
                    Cara <span class="text-amber-700">Kerja</span>
                </h2>
                <p class="text-gray-600 text-base lg:text-lg max-w-2xl mx-auto">
                    Tiga langkah mudah untuk menemukan cerita di balik setiap motif batik.
                </p>
            </div>

            <!-- Steps -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
                <!-- Step 1 -->
                <div class="text-center fade-in-up">
                    <div class="relative inline-block mb-6">
                        <div
                            class="w-20 h-20 lg:w-24 lg:h-24 bg-amber-700 rounded-full flex items-center justify-center shadow-xl">
                            <span class="text-3xl lg:text-4xl font-bold text-white">1</span>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-amber-500 rounded-full animate-ping"></div>
                    </div>
                    <h3 class="text-xl lg:text-2xl font-bold text-gray-800 mb-3">Upload Foto</h3>
                    <p class="text-gray-600 text-sm lg:text-base">
                        Ambil atau upload foto batik yang ingin Anda ketahui ceritanya.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="text-center fade-in-up" style="transition-delay: 0.2s;">
                    <div class="relative inline-block mb-6">
                        <div
                            class="w-20 h-20 lg:w-24 lg:h-24 bg-amber-700 rounded-full flex items-center justify-center shadow-xl">
                            <span class="text-3xl lg:text-4xl font-bold text-white">2</span>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-amber-500 rounded-full animate-ping"
                            style="animation-delay: 0.2s;"></div>
                    </div>
                    <h3 class="text-xl lg:text-2xl font-bold text-gray-800 mb-3">Analisis AI</h3>
                    <p class="text-gray-600 text-sm lg:text-base">
                        AI kami menganalisis motif dan mencocokkan dengan database budaya.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="text-center fade-in-up" style="transition-delay: 0.4s;">
                    <div class="relative inline-block mb-6">
                        <div
                            class="w-20 h-20 lg:w-24 lg:h-24 bg-amber-700 rounded-full flex items-center justify-center shadow-xl">
                            <span class="text-3xl lg:text-4xl font-bold text-white">3</span>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-amber-500 rounded-full animate-ping"
                            style="animation-delay: 0.4s;"></div>
                    </div>
                    <h3 class="text-xl lg:text-2xl font-bold text-gray-800 mb-3">Dapatkan Cerita</h3>
                    <p class="text-gray-600 text-sm lg:text-base">
                        Terima narasi lengkap tentang makna, sejarah, dan filosofi motif tersebut.
                    </p>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="text-center mt-12 lg:mt-16 fade-in-up">
                <a href="#"
                    class="inline-block bg-amber-700 hover:bg-amber-800 text-white py-4 px-8 lg:px-10 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 text-base lg:text-lg font-semibold">
                    Mulai Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-16 lg:py-20 px-[5%] lg:px-[10%] bg-amber-700">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                <!-- Stat 1 -->
                <div class="text-center fade-in-up">
                    <div class="text-3xl lg:text-5xl font-bold text-white mb-2">500+</div>
                    <div class="text-amber-100 text-sm lg:text-base">Motif Batik</div>
                </div>

                <!-- Stat 2 -->
                <div class="text-center fade-in-up" style="transition-delay: 0.1s;">
                    <div class="text-3xl lg:text-5xl font-bold text-white mb-2">1000+</div>
                    <div class="text-amber-100 text-sm lg:text-base">Pengguna Aktif</div>
                </div>

                <!-- Stat 3 -->
                <div class="text-center fade-in-up" style="transition-delay: 0.2s;">
                    <div class="text-3xl lg:text-5xl font-bold text-white mb-2">50+</div>
                    <div class="text-amber-100 text-sm lg:text-base">Perajin Terdaftar</div>
                </div>

                <!-- Stat 4 -->
                <div class="text-center fade-in-up" style="transition-delay: 0.3s;">
                    <div class="text-3xl lg:text-5xl font-bold text-white mb-2">95%</div>
                    <div class="text-amber-100 text-sm lg:text-base">Akurasi AI</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials / CTA Section -->
    <section class="py-16 lg:py-24 px-[5%] lg:px-[10%] bg-gradient-to-br from-white via-amber-50 to-orange-50">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-12 lg:mb-16 fade-in-up">
                <h2 class="text-3xl lg:text-4xl xl:text-5xl font-bold text-gray-800 mb-4">
                    Apa Kata <span class="text-amber-700">Mereka?</span>
                </h2>
                <p class="text-gray-600 text-base lg:text-lg max-w-2xl mx-auto">
                    Pendapat pengguna dan perajin yang telah merasakan manfaat Carita dalam melestarikan budaya lokal.
                </p>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 mb-16">
                <!-- Testimonial 1 -->
                <div
                    class="bg-white p-6 lg:p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 fade-in-up">
                    <div class="flex items-center gap-1 mb-4">
                        <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-gray-700 mb-6 text-sm lg:text-base leading-relaxed">
                        "Carita sangat membantu saya memahami sejarah di balik motif batik yang saya beli. Sangat
                        informatif dan mudah digunakan!"
                    </p>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-amber-400 to-amber-600 rounded-full flex items-center justify-center text-white font-bold">
                            S
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Siti Nurhaliza</h4>
                            <p class="text-sm text-gray-500">Pecinta Budaya</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white p-6 lg:p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 fade-in-up"
                    style="transition-delay: 0.1s;">
                    <div class="flex items-center gap-1 mb-4">
                        <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-gray-700 mb-6 text-sm lg:text-base leading-relaxed">
                        "Sebagai perajin, platform ini membantu saya menjangkau lebih banyak pembeli dan menceritakan
                        nilai di balik setiap karya."
                    </p>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-amber-400 to-amber-600 rounded-full flex items-center justify-center text-white font-bold">
                            B
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Budi Santoso</h4>
                            <p class="text-sm text-gray-500">Perajin Batik</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white p-6 lg:p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 fade-in-up"
                    style="transition-delay: 0.2s;">
                    <div class="flex items-center gap-1 mb-4">
                        <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-gray-700 mb-6 text-sm lg:text-base leading-relaxed">
                        "AI-nya akurat banget! Dalam hitungan detik saya bisa tau asal-usul dan makna dari motif batik
                        yang saya foto."
                    </p>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-amber-400 to-amber-600 rounded-full flex items-center justify-center text-white font-bold">
                            D
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Dewi Lestari</h4>
                            <p class="text-sm text-gray-500">Mahasiswa Seni</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Box -->
            <div
                class="bg-gradient-to-br from-amber-700 to-amber-600 rounded-3xl p-8 lg:p-12 text-center text-white shadow-2xl fade-in-up">
                <h3 class="text-2xl lg:text-4xl font-bold mb-4">
                    Siap Menjelajahi Warisan Budaya Indonesia?
                </h3>
                <p class="text-amber-100 text-base lg:text-lg mb-8 max-w-2xl mx-auto">
                    Bergabunglah dengan ribuan pengguna yang telah merasakan pengalaman menakjubkan dalam memahami
                    kekayaan budaya Majalengka.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#"
                        class="inline-flex items-center justify-center gap-2 bg-white text-amber-700 hover:bg-gray-100 py-4 px-8 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 font-semibold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Mulai Gratis Sekarang
                    </a>
                    <a href="#"
                        class="inline-flex items-center justify-center gap-2 border-2 border-white text-white hover:bg-white hover:text-amber-700 py-4 px-8 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 font-semibold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

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
                            <li><a href="#"
                                    class="hover:text-amber-500 transition-colors duration-300 text-sm lg:text-base">Beranda</a>
                            </li>
                            <li><a href="#"
                                    class="hover:text-amber-500 transition-colors duration-300 text-sm lg:text-base">Eksplorasi
                                    Budaya</a></li>
                            <li><a href="#"
                                    class="hover:text-amber-500 transition-colors duration-300 text-sm lg:text-base">Tentang
                                    Carita</a></li>
                            <li><a href="#"
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

</body>

</html>
