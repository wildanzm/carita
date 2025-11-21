<div class="bg-white mx-auto px-4 sm:px-6 lg:px-8 xl:px-[10%] lg:h-screen py-16 flex flex-col justify-center bg-cover bg-center"
    style="background-image: url('{{ asset('bg.svg') }}')">
    {{-- Heading --}}
    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8">
        Coba Langsung: Kenali Motif di Sekitar Anda
    </h1>

    {{-- FORM Livewire: Tahap 1 = ANALYZE --}}
    <form wire:submit.prevent="analyze" class="grid grid-cols-1 md:grid-cols-2 gap-6 h-auto md:h-[450px]">

        {{-- Kiri: Upload Card --}}
        <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col min-h-[250px]">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Unggah Foto Batik atau Kriya Anda</h2>

            {{-- Area Upload --}}
            <div
                class="flex-1 border-2 border-dashed border-gray-300 rounded-xl hover:bg-gray-50 transition relative group">
                {{-- Livewire file upload --}}
                <input type="file" id="file-upload" wire:model="image"
                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">

                <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-6">
                    {{-- Icon Upload --}}
                    <div class="mb-4 text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-12 h-12">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                        </svg>
                    </div>

                    <p class="text-gray-900 font-bold text-base mb-1 group-hover:text-amber-700 transition">
                        Klik untuk memilih foto
                    </p>

                    {{-- Info / nama file / error --}}
                    @if ($errors->has('image'))
                    <p class="text-sm text-red-600 mt-1">
                        {{ $errors->first('image') }}
                    </p>
                    @elseif ($image)
                    <p class="text-sm text-green-600 font-semibold" id="file-name">
                        File terpilih: {{ $image->getClientOriginalName() }}
                    </p>
                    @else
                    <p class="text-gray-500 text-sm" id="file-name">
                        Format: JPG, PNG (Maks. 5MB)
                    </p>
                    @endif
                </div>
            </div>

            {{-- Tombol ANALYZE --}}
            <div class="mt-4 flex justify-end">
                <button type="submit" class="inline-flex items-center px-5 py-2 rounded-full text-sm font-semibold
                           bg-amber-700 text-white hover:bg-amber-800 transition
                           disabled:opacity-60 disabled:cursor-not-allowed" wire:loading.attr="disabled"
                    wire:target="analyze,image">
                    <span wire:loading.remove wire:target="analyze,image">
                        Proses dengan AI
                    </span>
                    <span wire:loading wire:target="analyze,image" class="flex items-center gap-2">
                        <svg class="w-4 h-4 animate-spin" viewBox="0 0 24 24" fill="none">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8v4l3.5-3.5L12 0v4a8 8 0 00-8 8h4z"></path>
                        </svg>
                        Memproses...
                    </span>
                </button>
            </div>

            {{-- Error global --}}
            @if ($errorMessage)
            <p class="mt-2 text-sm text-red-600">
                {{ $errorMessage }}
            </p>
            @endif
        </div>

        {{-- Kanan: Hasil Analisis / Preview / Publish --}}
        <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col min-h-[250px]">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Hasil Analisis AI</h2>

            <div class="flex-1 flex flex-col items-stretch justify-center h-full">

                {{-- Loading untuk ANALYZE / PUBLISH --}}
                <div wire:loading wire:target="analyze,publish,image"
                    class="flex flex-col items-center justify-center text-center gap-3">
                    <div class="mb-2 text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-10 h-10 animate-pulse">
                            <path fill-rule="evenodd"
                                d="M9.352 3.356a.75.75 0 0 1 .53-.33 13.1 13.1 0 0 1 4.236 0 .75.75 0 0 1 .53.33l1.841 2.764 3.233.678a.75.75 0 0 1 .472 1.16l-2.02 2.703.248 3.293a.75.75 0 0 1-1.02.74l-3.06-1.23-3.06 1.23a.75.75 0 0 1-1.02-.74l.249-3.293-2.02-2.704a.75.75 0 0 1 .472-1.159l3.232-.678 1.842-2.764Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="text-gray-900 font-medium">
                        AI sedang memproses cerita Anda...
                    </p>
                    <p class="text-xs text-gray-500">
                        Mohon tunggu sebentar, kami menyiapkan narasi budayanya.
                    </p>
                </div>

                {{-- Setelah loading --}}
                <div wire:loading.remove wire:target="analyze,publish,image" class="h-full">
                    @if ($story)
                    {{-- ✅ Cerita SUDAH dipublish --}}
                    <div class="space-y-4">
                        <p class="text-xs text-gray-500">
                            Cerita dipublikasikan pada {{ optional($story->created_at)->format('d M Y H:i') }}
                        </p>

                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ $story->detected_motif ?? 'Motif terdeteksi' }}
                        </h3>

                        {{-- Caption promosi --}}
                        @if (!empty($story->caption))
                        <div class="p-3 rounded-lg bg-amber-50 border border-amber-100">
                            <p class="text-xs font-semibold text-amber-700 mb-1">
                                Caption promosi untuk UMKM
                            </p>
                            <p class="text-sm text-gray-800 whitespace-pre-line">
                                {{ $story->caption }}
                            </p>
                        </div>
                        @endif

                        {{-- Cerita budaya --}}
                        <div class="mt-2">
                            <p class="text-xs font-semibold text-gray-500 mb-1">
                                Cerita budaya / sejarah produk
                            </p>
                            <p class="text-sm text-gray-700 whitespace-pre-line">
                                {{ $story->narrative }}
                            </p>
                        </div>

                        <div class="mt-4 flex flex-wrap items-start gap-4">
                            @if ($story->qr_code_path)
                            <div class="text-center">
                                <p class="text-xs text-gray-500 mb-1">
                                    QR Cerita untuk ditempel di produk
                                </p>
                                <img src="{{ asset('storage/'.$story->qr_code_path) }}"
                                    class="w-28 h-28 border rounded-md mx-auto" alt="QR Code">
                            </div>
                            @endif

                            @if ($story->image_path)
                            <div class="text-center">
                                <p class="text-xs text-gray-500 mb-1">
                                    Foto yang dianalisis
                                </p>
                                <img src="{{ asset('storage/'.$story->image_path) }}"
                                    class="w-28 h-28 object-cover rounded-md border mx-auto" alt="Uploaded Image">
                            </div>
                            @endif
                        </div>

                        <a href="{{ route('stories.public.show', $story->public_id) }}"
                            class="inline-flex items-center mt-4 text-sm text-emerald-700 hover:text-emerald-900 underline">
                            Lihat halaman cerita publik
                        </a>
                    </div>

                    @elseif ($aiResult)
                    {{-- 🔍 Baru hasil AI (PREVIEW), belum dipublish --}}
                    <div class="space-y-4">
                        <p class="text-xs text-gray-500">
                            Hasil analisis awal – belum dipublikasikan
                        </p>

                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ $aiResult['detected_motif'] ?? 'Motif terdeteksi' }}
                        </h3>

                        {{-- Caption untuk jualan UMKM --}}
                        @if (!empty($aiResult['caption']))
                        <div class="p-3 rounded-lg bg-amber-50 border border-amber-100">
                            <p class="text-xs font-semibold text-amber-700 mb-1">
                                Caption promosi untuk UMKM
                            </p>
                            <p class="text-sm text-gray-800 whitespace-pre-line">
                                {{ $aiResult['caption'] }}
                            </p>
                        </div>
                        @endif

                        {{-- Cerita budaya / naratif panjang --}}
                        @if (!empty($aiResult['narrative']))
                        <div class="mt-2">
                            <p class="text-xs font-semibold text-gray-500 mb-1">
                                Cerita budaya / sejarah produk
                            </p>
                            <p class="text-sm text-gray-700 whitespace-pre-line max-h-48 overflow-y-auto">
                                {{ $aiResult['narrative'] }}
                            </p>
                        </div>
                        @endif

                        {{-- Preview foto --}}
                        @if ($image)
                        <div class="mt-3 text-center">
                            <p class="text-xs text-gray-500 mb-1">
                                Foto yang akan dipublikasikan
                            </p>
                            <img src="{{ $image->temporaryUrl() }}"
                                class="w-28 h-28 object-cover rounded-md border mx-auto" alt="Preview Image">
                        </div>
                        @endif

                        {{-- Tombol Publish --}}
                        <div class="mt-4 flex justify-end">
                            <button type="button" wire:click="publish" class="inline-flex items-center px-5 py-2 rounded-full text-sm font-semibold
                                           bg-emerald-700 text-white hover:bg-emerald-800 transition
                                           disabled:opacity-60 disabled:cursor-not-allowed"
                                wire:loading.attr="disabled" wire:target="publish">
                                Publish Cerita & Buat QR
                            </button>
                        </div>
                    </div>

                    @elseif ($errorMessage)
                    {{-- Error state --}}
                    <div class="text-sm text-red-600">
                        {{ $errorMessage }}
                    </div>

                    @else
                    {{-- Placeholder awal --}}
                    <div class="flex flex-col items-center justify-center text-center h-full">
                        <div class="mb-4 text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-12 h-12">
                                <path fill-rule="evenodd"
                                    d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813a3.75 3.75 0 0 0 2.576-2.576l.813-2.846A.75.75 0 0 1 9 4.5ZM9 15a.75.75 0 0 1 .75.75v1.5h1.5a.75.75 0 0 1 0 1.5h-1.5v1.5a.75.75 0 0 1-1.5 0v-1.5h-1.5a.75.75 0 0 1 0-1.5h1.5v-1.5A.75.75 0 0 1 9 15ZM15 9a.75.75 0 0 1 .75.75v1.5h1.5a.75.75 0 0 1 0 1.5h-1.5v1.5a.75.75 0 0 1-1.5 0v-1.5h-1.5a.75.75 0 0 1 0-1.5h1.5v-1.5A.75.75 0 0 1 15 9Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>

                        <p class="text-gray-900 font-medium">
                            Unggah foto dan proses dengan AI untuk melihat cerita budayanya.
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>