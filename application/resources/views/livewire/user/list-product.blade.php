<div>
    <!-- Profile Section -->
    <div class="text-center mb-8 animate-fade-in">
        <!-- Profile Photo -->
        <div class="relative inline-block mb-4">
            <div
                class="w-28 h-28 sm:w-32 sm:h-32 rounded-full bg-gradient-to-br from-amber-500 to-orange-600 p-1 shadow-xl">
                <div class="w-full h-full rounded-full bg-white flex items-center justify-center overflow-hidden">
                    @if ($user->profile_photo_path)
                        <img src="{{ Storage::url($user->profile_photo_path) }}" alt="{{ $user->name }}"
                            class="w-full h-full object-cover">
                    @else
                        <span class="text-3xl sm:text-4xl font-bold text-gray-700">
                            {{ $user->initials() }}
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Name -->
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">{{ $user->name }}</h1>

        @if ($user->phone)
            <p class="text-gray-600 text-sm sm:text-base">{{ $user->phone }}</p>
        @endif
    </div>

    <!-- Products Grid -->
    @if ($products->count() > 0)
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6 animate-fade-in-up">
            @foreach ($products as $product)
                <div
                    class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group border border-gray-100">
                    <!-- Product Image -->
                    <div class="aspect-square w-full overflow-hidden bg-gray-100">
                        @if ($product->main_image_path)
                            <img src="{{ Storage::url($product->main_image_path) }}" alt="{{ $product->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        @else
                            <div
                                class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                                <svg class="w-12 h-12 sm:w-16 sm:h-16 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <!-- Product Info -->
                    <div class="p-3 sm:p-4">
                        <h3
                            class="text-sm sm:text-base font-semibold text-gray-900 mb-2 line-clamp-2 min-h-[2.5rem] sm:min-h-[3rem] group-hover:text-amber-600 transition-colors">
                            {{ $product->name }}
                        </h3>

                        <div class="mb-3">
                            <span class="text-base sm:text-lg font-bold text-amber-600">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </span>
                        </div>

                        <!-- Button -->
                        <a href="#"
                            class="block w-full text-center px-4 py-2 sm:py-2.5 bg-gradient-to-r from-amber-500 to-orange-600 text-white text-sm font-semibold rounded-lg hover:from-amber-600 hover:to-orange-700 transition-all duration-300 shadow-sm hover:shadow-md">
                            Lihat Produk
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="text-center py-16 px-4">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-100 mb-4">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                    </path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Produk</h3>
            <p class="text-gray-600">Produk akan ditampilkan di sini setelah dipublikasikan.</p>
        </div>
    @endif

    <!-- Footer -->
    <div class="text-center mt-12 pt-8 border-t border-gray-200">
        <p class="text-sm text-gray-500">
            Powered by <span class="font-semibold text-gray-700">Carita</span>
        </p>
    </div>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.6s ease-out;
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.6s ease-out;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .aspect-square {
            aspect-ratio: 1 / 1;
        }
    </style>
</div>
