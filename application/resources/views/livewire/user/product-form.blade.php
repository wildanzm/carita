<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center gap-4 mb-4">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">
                {{ $isEditing ? 'Edit Produk' : 'Tambah Produk Baru' }}
            </h1>
        </div>
        <p class="text-gray-600">
            {{ $isEditing ? 'Perbarui informasi produk Anda' : 'Tambahkan produk baru ke katalog Anda' }}
        </p>
    </div>

    <!-- Flash Message -->
    @if (session()->has('message'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg flex items-center gap-3">
            <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <p class="text-green-800 text-sm font-medium">{{ session('message') }}</p>
        </div>
    @endif

    <!-- Form -->
    <form wire:submit="save" class="space-y-6">
        <!-- Import from AI Story -->
        <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-xl shadow-sm border border-amber-200 p-6">
            <div class="flex items-start justify-between gap-4 mb-4">
                <div>
                    <h2 class="text-lg font-bold text-amber-900 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Isi Otomatis dengan AI Carita
                    </h2>
                    <p class="text-sm text-amber-800/80 mt-1">
                        Pilih hasil analisis motif yang sudah Anda buat untuk mengisi nama, deskripsi, dan foto produk
                        secara otomatis.
                    </p>
                </div>
                <a href="{{ route('upload-image') }}"
                    class="flex-shrink-0 inline-flex items-center gap-2 px-4 py-2 bg-white border border-amber-200 text-amber-700 text-sm font-semibold rounded-lg hover:bg-amber-50 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Scan Motif Baru
                </a>
            </div>

            @if (count($stories) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($stories as $story)
                        <label class="relative cursor-pointer group block"
                            onclick="handleRadioClick('{{ $story->id }}')">
                            <input type="radio" wire:model.live="selectedStoryId" value="{{ $story->id }}"
                                class="sr-only peer" id="story-{{ $story->id }}">
                            <div
                                class="p-3 bg-white border-2 rounded-xl transition-all duration-200 hover:border-amber-300 peer-checked:border-amber-600 peer-checked:bg-amber-50 peer-checked:ring-1 peer-checked:ring-amber-600 {{ $selectedStoryId == $story->id ? 'border-amber-600 bg-amber-50 ring-1 ring-amber-600' : 'border-gray-200' }}">
                                <div class="flex items-start gap-3">
                                    <img src="{{ Storage::url($story->image_path) }}"
                                        class="w-12 h-12 rounded-lg object-cover bg-gray-100" alt="Thumbnail">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-bold text-gray-900 truncate">{{ $story->detected_motif }}
                                        </p>
                                        <p class="text-xs text-gray-500">{{ $story->created_at->format('d M Y') }}</p>
                                    </div>
                                    <div
                                        class="w-5 h-5 rounded-full border-2 flex items-center justify-center peer-checked:border-amber-600 peer-checked:bg-amber-600 {{ $selectedStoryId == $story->id ? 'border-amber-600 bg-amber-600' : 'border-gray-300' }}">
                                        <svg class="w-3 h-3 text-white peer-checked:opacity-100 {{ $selectedStoryId == $story->id ? 'opacity-100' : 'opacity-0' }}"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </label>
                    @endforeach
                </div>
            @else
                <div class="text-center py-6 bg-white/50 rounded-lg border border-dashed border-amber-200">
                    <p class="text-sm text-amber-800">Belum ada riwayat analisis motif.</p>
                </div>
            @endif
        </div>
        <!-- Main Image Upload -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <label class="block text-sm font-semibold text-gray-900 mb-4">
                Foto Produk <span class="text-red-500">*</span>
            </label>

            <div class="flex flex-col items-center">
                <!-- Image Preview -->
                <div
                    class="w-full max-w-md aspect-square rounded-xl overflow-hidden bg-gray-100 border-2 border-dashed border-gray-300 mb-4">
                    @if ($main_image_path && is_object($main_image_path))
                        <img src="{{ $main_image_path->temporaryUrl() }}" alt="Preview"
                            class="w-full h-full object-cover">
                    @elseif ($existing_image)
                        <img src="{{ Storage::url($existing_image) }}" alt="Current Image"
                            class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                            <svg class="w-16 h-16 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <p class="text-sm font-medium">Belum ada foto</p>
                        </div>
                    @endif
                </div>

                <!-- Upload Button -->
                <label
                    class="inline-flex items-center gap-2 px-6 py-3 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg transition-all duration-300 shadow-sm cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                    </svg>
                    <span>{{ $main_image_path || $existing_image ? 'Ganti Foto' : 'Upload Foto' }}</span>
                    <input type="file" wire:model="main_image_path" accept="image/*" class="hidden">
                </label>

                <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG (Maks. 2MB)</p>
            </div>

            @error('main_image_path')
                <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ $message }}
                </p>
            @enderror

            <!-- Loading Indicator -->
            <div wire:loading wire:target="main_image_path" class="mt-3 text-center">
                <div class="inline-flex items-center gap-2 text-sm text-amber-600">
                    <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    <span>Mengupload foto...</span>
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-5">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Detail Produk</h2>

            <!-- Product Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Produk <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" wire:model="name" placeholder="Contoh: Batik Tulis Premium"
                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 transition-colors {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300 focus:border-gray-300' }}">
                @error('name')
                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    Deskripsi Produk
                </label>
                <textarea id="description" wire:model="description" rows="4"
                    placeholder="Deskripsikan produk Anda secara detail..."
                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 transition-colors resize-none {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300 focus:border-gray-300' }}"></textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Price and Stock -->
            <div>
                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                        Harga <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">Rp</span>
                        <input type="number" id="price" wire:model="price" placeholder="0" min="0"
                            class="w-full pl-12 pr-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 transition-colors {{ $errors->has('price') ? 'border-red-500' : 'border-gray-300 focus:border-gray-300' }}">
                    </div>
                    @error('price')
                        <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Publish Status -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <h3 class="text-sm font-semibold text-gray-900">Status Publikasi</h3>
                    <p class="text-sm text-gray-600 mt-1">
                        {{ $is_published ? 'Produk akan ditampilkan di halaman publik' : 'Produk tidak akan ditampilkan di halaman publik' }}
                    </p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" wire:model="is_published" class="sr-only peer">
                    <div
                        class="w-14 h-7 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-gradient-to-r peer-checked:from-amber-500 peer-checked:to-orange-600">
                    </div>
                </label>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col-reverse sm:flex-row gap-3 sm:justify-end">
            <a href="{{ route('product.index') }}"
                class="inline-flex items-center justify-center px-6 py-3 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg transition-colors">
                Batal
            </a>
            <button type="submit" wire:loading.attr="disabled" wire:target="save"
                class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-600 text-white font-semibold rounded-lg hover:from-amber-600 hover:to-orange-700 transition-all duration-300 shadow-sm hover:shadow-md disabled:opacity-50 disabled:cursor-not-allowed">
                <span wire:loading.remove wire:target="save">
                    {{ $isEditing ? 'Perbarui Produk' : 'Tambah Produk' }}
                </span>
                <span wire:loading wire:target="save" class="inline-flex items-center gap-2">
                    <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    Menyimpan...
                </span>
            </button>
        </div>
    </form>
</div>

<script>
    function handleRadioClick(storyId) {
        event.preventDefault();

        // Get the current selected story ID from Livewire
        const currentSelected = @js($selectedStoryId);

        // If clicking on the already selected radio button, unselect it
        if (currentSelected == storyId) {
            @this.set('selectedStoryId', '');
        } else {
            // Select the new one
            @this.set('selectedStoryId', storyId);
        }
    }
</script>
