<div class="min-h-screen bg-gradient-to-br from-amber-50 via-white to-orange-50">
    <!-- Hero Section -->
    <div class="px-[5%] lg:px-[10%] pt-24 pb-8 lg:pt-32 lg:pb-12">
        <div class="max-w-6xl mx-auto">
            <!-- Back Button -->
            <button onclick="history.back()"
                class="inline-flex items-center gap-2 text-gray-600 hover:text-amber-700 mb-6 transition-colors group">
                <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span class="font-medium">Kembali</span>
            </button>

            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                <!-- Image Section -->
                <div class="order-2 lg:order-1">
                    <div class="relative">
                        <!-- Decorative Elements -->
                        <div class="absolute -top-4 -left-4 w-24 h-24 bg-amber-200/30 rounded-full blur-2xl"></div>
                        <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-orange-200/30 rounded-full blur-2xl"></div>

                        <!-- Main Image Card -->
                        <div
                            class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white transform hover:scale-[1.02] transition-transform duration-300">
                            <img src="/images/carita-main.jpg" alt="Batik yang dianalisis"
                                class="w-full aspect-square object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent">
                            </div>

                            <!-- AI Detection Badge -->
                            <div
                                class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg flex items-center gap-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-sm font-semibold text-gray-800">AI Terdeteksi</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="order-1 lg:order-2">
                    <!-- Analysis Badge -->
                    <div
                        class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-100 to-orange-100 px-4 py-2 rounded-full mb-6 border border-amber-200">
                        <svg class="w-5 h-5 text-amber-700" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <span class="text-sm font-semibold text-amber-800">Hasil Analisis AI</span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4 leading-tight">
                        Batik <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-orange-600">Mega
                            Mendung</span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-xl text-gray-600 mb-8">
                        Motif awan berlapis dengan filosofi perjalanan spiritual
                    </p>

                    <!-- Confidence Score -->
                    <div class="bg-white rounded-xl p-5 shadow-lg mb-6 border border-gray-100">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-600">Tingkat Kepercayaan AI</span>
                            <span class="text-2xl font-bold text-amber-700">95%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                            <div class="bg-gradient-to-r from-amber-500 via-amber-600 to-orange-600 h-full rounded-full shadow-inner"
                                style="width: 95%"></div>
                        </div>
                    </div>

                    <!-- Quick Info Grid -->
                    <div class="grid grid-cols-2 gap-4">
                        <div
                            class="bg-gradient-to-br from-white to-orange-50 rounded-xl p-4 shadow-md border border-orange-100">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <div class="text-sm text-gray-600 font-medium">Dianalisis</div>
                            </div>
                            <div class="text-lg font-bold text-gray-900">20 Nov 2025, 14:30</div>
                        </div>
                        <div
                            class="bg-gradient-to-br from-white to-orange-50 rounded-xl p-4 shadow-md border border-orange-100">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                    </path>
                                </svg>
                                <div class="text-sm text-gray-600 font-medium">Kategori</div>
                            </div>
                            <div class="text-lg font-bold text-gray-900">Batik</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Asal Usul Section -->
    <div class="px-[5%] lg:px-[10%] py-12 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="gap-6 lg:gap-8">
                <!-- Makna Filosofis -->
                <div class="border-l-4 border-amber-700 rounded-2xl p-6 lg:p-8  transition-all duration-300 group">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-orange-600 to-orange-700 rounded-xl flex items-center justify-center mb-5 shadow-lg group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Makna Filosofis</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Setiap lapisan awan memiliki makna tersendiri. Warna gelap melambangkan kehidupan duniawi,
                        sementara warna terang menggambarkan pencerahan spiritual dan kedekatan dengan Yang Maha Kuasa.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="px-[5%] lg:px-[10%] py-12">
        <div class="max-w-4xl mx-auto">
            <div
                class="bg-gradient-to-r from-amber-600 via-amber-700 to-orange-600 rounded-2xl p-8 lg:p-12 text-center text-white shadow-2xl relative overflow-hidden">
                <!-- Decorative circles -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2">
                </div>
                <div
                    class="absolute bottom-0 left-0 w-40 h-40 bg-white/10 rounded-full translate-y-1/2 -translate-x-1/2">
                </div>

                <div class="relative z-10">
                    <h3 class="text-2xl lg:text-3xl font-bold mb-4">
                        Ingin Menganalisis Motif Lainnya?
                    </h3>
                    <p class="text-amber-100 mb-6 max-w-2xl mx-auto text-lg">
                        Upload foto batik Anda dan biarkan AI kami mengidentifikasi motif beserta cerita dan asal
                        usulnya.
                    </p>
                    <button
                        class="bg-white text-amber-700 hover:bg-amber-50 px-8 py-4 rounded-full font-bold text-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 inline-flex items-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                            </path>
                        </svg>
                        Upload Foto Baru
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
