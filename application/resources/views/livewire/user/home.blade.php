<div>

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
                    <a href="{{ route('upload-image') }}"
                        class="inline-flex items-center justify-center gap-2 bg-amber-700 hover:bg-amber-800 text-white py-4 px-8 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 font-semibold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                            </path>
                        </svg>
                        Coba Carita AI
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
</div>

<script src="https://unpkg.com/kursor/dist/kursor.js"></script>

{{-- 3. Inisialisasi Efek --}}
<script>
    new kursor({
        type: 2, 
        removeDefaultCursor: true, 
        color: '#D95D0E' 
    })
</script>   
