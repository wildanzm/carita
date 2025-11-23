@php
    use Illuminate\Support\Facades\Storage;
@endphp

<style>
    @media (max-width: 640px) {
        .glassmorphism {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
        }
    }
</style>

<div class="space-y-6">
    <!-- Header Section -->
    <div class="glassmorphism rounded-2xl p-4 sm:p-6 shadow-xl">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Daftar Produk</h1>
                <p class="text-gray-600 text-sm sm:text-base">Kelola produk UMKM Anda dengan mudah</p>
            </div>
            <div class="flex gap-3">
                @if (auth()->user()->phone)
                    <a href="{{ route('product.create') }}"
                        class="inline-flex items-center gap-2 px-4 sm:px-6 py-2 sm:py-3 bg-gradient-to-r from-amber-600 to-amber-700 text-white rounded-xl hover:from-amber-700 hover:to-amber-800 transition-all duration-300 shadow-lg hover:shadow-xl font-medium text-sm sm:text-base">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        <span class="hidden sm:inline">Tambah Produk</span>
                        <span class="sm:hidden">Tambah</span>
                    </a>
                @else
                    <button wire:click="redirectToProfile"
                        class="inline-flex items-center gap-2 px-4 sm:px-6 py-2 sm:py-3 bg-gradient-to-r from-gray-400 to-gray-500 text-white rounded-xl cursor-not-allowed font-medium text-sm sm:text-base opacity-60"
                        disabled>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                        <span class="hidden sm:inline">Lengkapi Profil Dulu</span>
                        <span class="sm:hidden">Profil</span>
                    </button>
                @endif
            </div>
        </div>
    </div>

    <!-- Flash Message -->
    @if (session()->has('message'))
        <div class="glassmorphism rounded-xl p-4 border-l-4 border-green-500 shadow-lg">
            <div class="flex items-center gap-3">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <p class="text-green-800 font-medium">{{ session('message') }}</p>
            </div>
        </div>
    @endif

    <!-- Phone Number Requirement Info -->
    @if (!auth()->user()->phone)
        <div class="glassmorphism rounded-2xl p-4 sm:p-6 shadow-xl border border-amber-200">
            <div class="flex items-start gap-4">
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Nomor Handphone Diperlukan</h3>
                    <p class="text-gray-600 mb-4">
                        Untuk dapat menambah produk, Anda perlu melengkapi nomor handphone terlebih dahulu.
                        Nomor handphone ini akan digunakan untuk komunikasi dengan pelanggan.
                    </p>
                    <a href="{{ route('profile.edit') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-amber-600 to-amber-700 text-white font-semibold rounded-xl hover:from-amber-700 hover:to-amber-800 transition-all duration-300 shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Lengkapi Profil
                    </a>
                </div>
            </div>
        </div>
    @endif

    <!-- URL Link Section -->
    <div class="glassmorphism rounded-2xl p-4 sm:p-6 shadow-xl">
        <div class="space-y-3">
            <label class="block text-sm font-semibold text-gray-700">Link Halaman Produk Anda</label>
            <p class="text-sm text-gray-600">Bagikan link ini kepada pelanggan untuk melihat semua produk Anda</p>
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="flex-1 relative">
                    <input type="text" id="product-url" value="{{ url('/' . auth()->user()->username) }}" readonly
                        class="w-full px-4 py-3 pr-12 rounded-xl border border-gray-300 bg-gray-50 text-gray-700 font-mono text-sm">
                    <button onclick="copyToClipboard()"
                        class="absolute right-2 top-1/2 -translate-y-1/2 p-2 text-gray-500 hover:text-amber-600 transition-colors"
                        title="Copy URL">
                        <svg id="copy-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                            </path>
                        </svg>
                        <svg id="check-icon" class="w-5 h-5 hidden text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </button>
                </div>
                <a href="{{ url('/' . auth()->user()->username) }}" target="_blank"
                    class="inline-flex items-center justify-center gap-2 px-4 sm:px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-600 text-white font-semibold rounded-xl hover:from-amber-600 hover:to-orange-700 transition-all duration-300 shadow-sm hover:shadow-md text-sm sm:text-base">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    <span class="hidden sm:inline">Buka</span>
                    <span class="sm:hidden">Lihat</span>
                </a>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard() {
            const input = document.getElementById('product-url');
            const copyIcon = document.getElementById('copy-icon');
            const checkIcon = document.getElementById('check-icon');

            input.select();
            input.setSelectionRange(0, 99999);

            navigator.clipboard.writeText(input.value).then(() => {
                copyIcon.classList.add('hidden');
                checkIcon.classList.remove('hidden');

                setTimeout(() => {
                    copyIcon.classList.remove('hidden');
                    checkIcon.classList.add('hidden');
                }, 2000);
            });
        }
    </script>

    <!-- Products Section -->
    <div class="glassmorphism rounded-2xl shadow-xl overflow-hidden">
        <!-- Desktop Table View -->
        <div class="hidden md:block">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-amber-50 to-amber-100 border-b-2 border-amber-200">
                        <tr>
                            <th
                                class="px-6 py-4 text-center text-xs font-bold text-amber-900 uppercase tracking-wider w-16">
                                No
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-amber-900 uppercase tracking-wider">
                                Gambar
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-amber-900 uppercase tracking-wider">
                                Produk
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-amber-900 uppercase tracking-wider">
                                Harga
                            </th>
                            <th
                                class="px-6 py-4 text-center text-xs font-bold text-amber-900 uppercase tracking-wider">
                                Publish
                            </th>
                            <th
                                class="px-6 py-4 text-center text-xs font-bold text-amber-900 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($products as $index => $product)
                            <tr class="hover:bg-amber-50/50 transition-colors duration-200">
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="font-semibold text-gray-700">{{ $products->firstItem() + $index }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    @if ($product->main_image_path)
                                        <img src="{{ Storage::url($product->main_image_path) }}"
                                            alt="{{ $product->name }}"
                                            class="w-16 h-16 object-cover rounded-lg shadow-md">
                                    @else
                                        <div
                                            class="w-16 h-16 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="font-semibold text-gray-900">{{ $product->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="font-semibold text-gray-900">Rp
                                        {{ number_format($product->price, 0, ',', '.') }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <button wire:click="togglePublish({{ $product->id }})"
                                            class="p-2 rounded-lg {{ $product->is_published ? 'bg-green-100 text-green-600 hover:bg-green-200' : 'bg-red-100 text-red-600 hover:bg-red-200' }} transition-all duration-200"
                                            title="{{ $product->is_published ? 'Dipublikasi - Klik untuk menyembunyikan' : 'Disembunyikan - Klik untuk publikasi' }}">
                                            @if ($product->is_published)
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            @else
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            @endif
                                        </button>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('product.edit', $product->id) }}"
                                            class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors duration-200"
                                            title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>
                                        <button wire:click="confirmDelete({{ $product->id }})"
                                            class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-200"
                                            title="Hapus">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-3">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                            </path>
                                        </svg>
                                        <p class="text-gray-600 font-medium">Belum ada produk</p>
                                        <p class="text-gray-500 text-sm">Mulai tambahkan produk pertama Anda</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Mobile Card View -->
        <div class="md:hidden">
            <div class="divide-y divide-gray-200">
                @forelse($products as $index => $product)
                    <div class="p-4 hover:bg-amber-50/50 transition-colors duration-200">
                        <div class="flex items-start gap-4">
                            <!-- Product Image -->
                            <div class="flex-shrink-0">
                                @if ($product->main_image_path)
                                    <img src="{{ Storage::url($product->main_image_path) }}"
                                        alt="{{ $product->name }}"
                                        class="w-20 h-20 object-cover rounded-xl shadow-md">
                                @else
                                    <div
                                        class="w-20 h-20 bg-gradient-to-br from-gray-200 to-gray-300 rounded-xl flex items-center justify-center">
                                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <!-- Product Info -->
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between mb-2">
                                    <div class="flex-1 min-w-0">
                                        <h3 class="font-semibold text-gray-900 text-lg truncate">{{ $product->name }}
                                        </h3>
                                        <p class="text-amber-600 font-bold text-lg">Rp
                                            {{ number_format($product->price, 0, ',', '.') }}</p>
                                    </div>
                                    <span
                                        class="text-sm font-medium text-gray-500 ml-2">#{{ $products->firstItem() + $index }}</span>
                                </div>

                                <div class="flex items-center justify-between mb-3">
                                    <button wire:click="togglePublish({{ $product->id }})"
                                        class="p-2 rounded-lg {{ $product->is_published ? 'bg-green-100 text-green-600 hover:bg-green-200' : 'bg-red-100 text-red-600 hover:bg-red-200' }} transition-all duration-200"
                                        title="{{ $product->is_published ? 'Dipublikasi - Klik untuk menyembunyikan' : 'Disembunyikan - Klik untuk publikasi' }}">
                                        @if ($product->is_published)
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        @else
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        @endif
                                    </button>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('product.edit', $product->id) }}"
                                        class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200 text-sm font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                        Edit
                                    </a>
                                    <button wire:click="confirmDelete({{ $product->id }})"
                                        class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-all duration-200 text-sm font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center gap-3">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                </path>
                            </svg>
                            <p class="text-gray-600 font-medium">Belum ada produk</p>
                            <p class="text-gray-500 text-sm">Mulai tambahkan produk pertama Anda</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        @if ($products->hasPages())
            <div class="px-4 sm:px-6 py-4 border-t border-gray-200">
                {{ $products->links() }}
            </div>
        @endif
    </div>

    <!-- Delete Confirmation Modal -->
    @if ($showDeleteModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" style="background-color: rgba(0, 0, 0, 0.5);">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" wire:click="closeModal"></div>

                <div
                    class="inline-block align-bottom glassmorphism rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="px-4 sm:px-6 pt-6 pb-4">
                        <div class="flex items-center gap-3 sm:gap-4">
                            <div
                                class="flex-shrink-0 flex items-center justify-center h-10 w-10 sm:h-12 sm:w-12 rounded-full bg-red-100">
                                <svg class="h-5 w-5 sm:h-6 sm:w-6 text-red-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-base sm:text-lg font-bold text-gray-900">Konfirmasi Hapus</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Apakah Anda yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="px-4 sm:px-6 py-3 sm:py-4 bg-gray-50 flex flex-col sm:flex-row justify-end gap-3">
                        <button type="button" wire:click="closeModal"
                            class="w-full sm:w-auto px-4 sm:px-6 py-2 sm:py-3 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition-all duration-300 font-medium text-sm sm:text-base">
                            Batal
                        </button>
                        <button type="button" wire:click="delete"
                            class="w-full sm:w-auto px-4 sm:px-6 py-2 sm:py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-xl hover:from-red-700 hover:to-red-800 transition-all duration-300 shadow-lg hover:shadow-xl font-medium text-sm sm:text-base">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
