@php
    use Illuminate\Support\Facades\Storage;
@endphp

<div class="animate-fade-in">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ url('/' . $username) }}"
            class="inline-flex items-center gap-2 text-gray-600 hover:text-amber-600 transition-colors font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Product Detail -->
    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100 overflow-hidden mb-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
            <!-- Product Image -->
            <div class="relative aspect-square bg-gray-100">
                @if ($product->main_image_path)
                    <img src="{{ Storage::url($product->main_image_path) }}" alt="{{ $product->name }}"
                        class="w-full h-full object-cover">
                @else
                    <div
                        class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                        <svg class="w-32 h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                @endif
            </div>

            <!-- Product Info (without description) -->
            <div class="p-6 sm:p-8 lg:p-10 flex flex-col">
                <!-- Seller Info -->
                <div class="mb-6 pb-6 border-b border-gray-200">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 rounded-full bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center text-white font-bold">
                            {{ $product->user->initials() }}
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">{{ $product->user->name }}</p>
                        </div>
                    </div>
                </div>

                <!-- Product Name -->
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                    {{ $product->name }}
                </h1>

                <!-- Price -->
                <div class="mb-8">
                    <span class="text-3xl sm:text-4xl font-bold text-amber-600">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                </div>

                <!-- Spacer -->
                <div class="flex-1"></div>

                <!-- CTA Button -->
                <div class="mt-8 space-y-3">
                    <a href="{{ $this->getWhatsappLink() }}" target="_blank"
                        class="block w-full text-center px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-600 text-white text-lg font-bold rounded-xl hover:from-amber-600 hover:to-orange-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-[1.02]">
                        <span class="inline-flex items-center justify-center gap-3">
                            <span>Beli Produk</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Description Section (Separated) -->
    @if ($product->description)
        <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-100 p-6 sm:p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Deskripsi Produk</h2>
            <div x-data="{ expanded: false }" class="text-gray-700 leading-relaxed">
                <div :class="expanded ? '' : 'line-clamp-5'" class="whitespace-pre-line">{{ $product->description }}
                </div>
                @if (strlen($product->description) > 300)
                    <button @click="expanded = !expanded"
                        class="mt-3 text-amber-600 hover:text-amber-700 font-semibold text-sm inline-flex items-center gap-1">
                        <span x-text="expanded ? 'Sembunyikan' : 'Selengkapnya'"></span>
                        <svg x-show="!expanded" class="w-4 h-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                        <svg x-show="expanded" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7">
                            </path>
                        </svg>
                    </button>
                @endif
            </div>
        </div>
    @endif

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.5s ease-out;
        }

        .line-clamp-5 {
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</div>
