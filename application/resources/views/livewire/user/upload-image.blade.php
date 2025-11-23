<div>
    <div class="bg-white mx-auto px-4 sm:px-6 lg:px-8 xl:px-[10%] py-32 bg-cover bg-center"
        style="background-image: url('{{ asset('bg.svg') }}')">

        {{-- Heading --}}
        <div class="mb-10">
            <p class="text-xs font-semibold tracking-[0.2em] text-amber-700 uppercase mb-1">
                Demo CARITA AI
            </p>
            <h1 class="text-2xl md:text-3xl font-bold text-slate-900">
                Buat Carita Budaya dengan AI
            </h1>
            <p class="text-sm md:text-base text-slate-600 mt-2 max-w-2xl">
                Unggah foto batik atau kriya, biarkan AI mendeteksi motif, merangkai filosofi budaya,
                dan membuat caption promosi untuk UMKM.
            </p>
        </div>

        {{-- FORM Livewire: Tahap 1 = ANALYZE --}}
        <form wire:submit.prevent="analyze"
            class="grid grid-cols-1 xl:grid-cols-[minmax(0,1.05fr)_minmax(0,1.2fr)] gap-6 items-start">

            {{-- KIRI: Upload Card --}}
            <div
                class="bg-white/95 rounded-3xl shadow-[0_18px_40px_rgba(15,23,42,0.08)] border border-amber-100 p-6 md:p-7 space-y-4">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h2 class="text-lg md:text-xl font-bold text-slate-900">
                            Unggah Foto Batik atau Kriya Anda
                        </h2>
                        <p class="text-xs md:text-sm text-slate-500 mt-1">
                            Gunakan foto jelas dari produk atau kain, satu motif dominan per gambar.
                        </p>
                    </div>
                </div>

                {{-- Area Upload --}}
                <div
                    class="mt-2 border-2 border-dashed border-amber-200 rounded-2xl bg-amber-50/60 hover:bg-amber-50 transition relative group min-h-[220px] flex items-center justify-center overflow-hidden">
                    {{-- Livewire file upload --}}
                    <input type="file" id="file-upload" wire:model="image"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />

                    <div class="flex flex-col items-center justify-center text-center px-6 relative z-0">
                        @if ($image)
                            {{-- Preview Image --}}
                            <div class="mb-3 relative">
                                <img src="{{ $image->temporaryUrl() }}"
                                    class="w-32 h-32 object-cover rounded-lg shadow-md" alt="Preview">
                                <div
                                    class="absolute inset-0 bg-black/20 rounded-lg flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <p class="text-white text-xs font-semibold">Ganti Foto</p>
                                </div>
                            </div>
                            <p class="text-[11px] text-amber-700 font-semibold mt-1" id="file-name">
                                {{ $image->getClientOriginalName() }}
                            </p>
                            <p class="text-[10px] text-green-600 font-medium flex items-center gap-1 mt-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Foto berhasil diunggah
                            </p>
                        @else
                            {{-- Icon Upload --}}
                            <div
                                class="mb-4 inline-flex items-center justify-center rounded-full bg-white shadow-sm p-3 ring-1 ring-amber-200 text-amber-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-7 h-7">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                                </svg>
                            </div>

                            <p
                                class="text-slate-900 font-semibold text-base mb-1 group-hover:text-amber-700 transition">
                                Klik di sini untuk memilih foto
                            </p>
                            <p class="text-[11px] text-slate-500 mt-1" id="file-name">
                                Format: JPG, PNG &middot; Maksimal 5MB
                            </p>
                        @endif

                        {{-- Error --}}
                        @if ($errors->has('image'))
                            <p class="text-xs text-rose-600 mt-2 font-medium bg-rose-50 px-2 py-1 rounded">
                                {{ $errors->first('image') }}
                            </p>
                        @endif
                    </div>
                </div>
                {{-- Pengaturan Bahasa Caption --}}
                <div class="pt-5 mt-5 border-t border-dashed border-amber-100">
                    <div class="flex items-center justify-between gap-2 mb-3">
                        <p class="text-[11px] font-semibold text-amber-800 uppercase tracking-wide">
                            Bahasa &amp; gaya caption
                        </p>

                        <span
                            class="hidden md:inline-flex items-center px-2.5 py-0.5 rounded-full border border-amber-100 bg-amber-50 text-[10px] font-medium text-amber-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5"></span>
                            Bisa diubah sebelum publish
                        </span>
                    </div>

                    <div class="space-y-4 rounded-2xl bg-amber-50/40 px-3 py-4">
                        {{-- Segmented buttons --}}
                        <div
                            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-3 gap-y-4 text-[11px] md:text-xs">
                            {{-- Indonesia --}}
                            <button type="button" wire:click="$set('captionLanguage', 'id')"
                                @class([
                                    'relative w-full rounded-2xl border px-3 py-3 text-left transition focus:outline-none focus:ring-2 focus:ring-amber-400/80',
                                    'border-amber-400 bg-amber-50 text-amber-900 shadow-sm' =>
                                        $captionLanguage === 'id',
                                    'border-slate-200 text-slate-600 hover:border-amber-300 hover:bg-amber-50/60' =>
                                        $captionLanguage !== 'id',
                                ])>
                                <div class="flex items-start gap-2">

                                    <div class="space-y-0.5">
                                        <p class="font-semibold leading-tight">Indonesia</p>
                                        <p class="text-[10px] text-slate-500 leading-snug">
                                            Formal, cocok untuk caption UMKM.
                                        </p>
                                    </div>
                                </div>

                                @if ($captionLanguage === 'id')
                                    {{-- Badge diposisikan absolute di pojok kartu --}}
                                    <span
                                        class="absolute -top-2.5 -right-2.5 inline-flex items-center rounded-full bg-amber-500 text-white px-2 py-0.5 text-[9px] font-semibold shadow-sm">
                                        Direkomendasikan
                                    </span>
                                @endif
                            </button>

                            {{-- Santai --}}
                            <button type="button" wire:click="$set('captionLanguage', 'santai')"
                                @class([
                                    'w-full rounded-2xl border px-3 py-3 text-left transition focus:outline-none focus:ring-2 focus:ring-amber-400/80',
                                    'border-amber-400 bg-amber-50 text-amber-900 shadow-sm' =>
                                        $captionLanguage === 'santai',
                                    'border-slate-200 text-slate-600 hover:border-amber-300 hover:bg-amber-50/60' =>
                                        $captionLanguage !== 'santai',
                                ])>
                                <div class="flex items-start gap-2">

                                    <div class="space-y-0.5">
                                        <p class="font-semibold leading-tight">Santai</p>
                                        <p class="text-[10px] text-slate-500 leading-snug">
                                            Gaya casual & friendly untuk media sosial.
                                        </p>
                                    </div>
                                </div>
                            </button>

                            {{-- Sunda --}}
                            <button type="button" wire:click="$set('captionLanguage', 'su')"
                                @class([
                                    'w-full rounded-2xl border px-3 py-3 text-left transition focus:outline-none focus:ring-2 focus:ring-amber-400/80',
                                    'border-amber-400 bg-amber-50 text-amber-900 shadow-sm' =>
                                        $captionLanguage === 'su',
                                    'border-slate-200 text-slate-600 hover:border-amber-300 hover:bg-amber-50/60' =>
                                        $captionLanguage !== 'su',
                                ])>
                                <div class="flex items-start gap-2">

                                    <div class="space-y-0.5">
                                        <p class="font-semibold leading-tight">Sunda</p>
                                        <p class="text-[10px] text-slate-500 leading-snug">
                                            Ngadeukeutan warga lokal &amp; wisatawan domestik.
                                        </p>
                                    </div>
                                </div>
                            </button>

                            {{-- English --}}
                            <button type="button" wire:click="$set('captionLanguage', 'en')"
                                @class([
                                    'w-full rounded-2xl border px-3 py-3 text-left transition focus:outline-none focus:ring-2 focus:ring-amber-400/80',
                                    'border-amber-400 bg-amber-50 text-amber-900 shadow-sm' =>
                                        $captionLanguage === 'en',
                                    'border-slate-200 text-slate-600 hover:border-amber-300 hover:bg-amber-50/60' =>
                                        $captionLanguage !== 'en',
                                ])>
                                <div class="flex items-start gap-2">

                                    <div class="space-y-0.5">
                                        <p class="font-semibold leading-tight">English</p>
                                        <p class="text-[10px] text-slate-500 leading-snug">
                                            Untuk wisatawan &amp; audiens internasional.
                                        </p>
                                    </div>
                                </div>
                            </button>
                        </div>

                        {{-- Error dari validasi --}}
                        @error('captionLanguage')
                            <p class="text-[11px] text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Tombol ANALYZE --}}
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 pt-3">
                    <p class="text-[11px] text-slate-500">
                        * Foto tidak akan dipublikasi sebelum Anda menekan tombol
                        <span class="font-semibold text-slate-800">Publish</span>.
                    </p>

                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 px-5 py-2 rounded-full text-sm font-semibold
               bg-amber-600 text-white hover:bg-amber-700 transition
               disabled:opacity-60 disabled:cursor-not-allowed"
                        wire:loading.attr="disabled" wire:target="analyze,image">

                        {{-- Teks selalu tampil --}}
                        <span>Buat Carita</span>

                        {{-- Spinner hanya muncul saat loading --}}
                        <span wire:loading wire:target="analyze,image" class="inline-flex items-center justify-center">
                            <svg class="w-4 h-4 animate-spin" viewBox="0 0 24 24" fill="none">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4" />
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8v4l3.5-3.5L12 0v4a8 8 0 00-8 8h4z" />
                            </svg>
                        </span>
                    </button>
                </div>


                {{-- Error global --}}
                @if ($errorMessage)
                    <p class="text-sm text-rose-600 pt-1">
                        {{ $errorMessage }}
                    </p>
                @endif
            </div>

            {{-- KANAN: Hasil Cerita / Preview / Publish --}}
            <div
                class="bg-white/95 rounded-3xl shadow-[0_18px_40px_rgba(15,23,42,0.08)] border border-amber-100 p-6 md:p-7 space-y-4">

                {{-- Header status --}}
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h2 class="text-lg md:text-xl font-bold text-slate-900">Hasil Cerita &amp; Caption</h2>
                        <p class="text-xs md:text-sm text-slate-500 mt-1">
                            Review hasil analisis AI sebelum dipublikasikan ke QR &amp; landing page UMKM.
                        </p>
                    </div>

                    @if ($story)
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-amber-50 text-amber-800 border border-amber-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5"></span>
                            Dipublikasikan
                        </span>
                    @elseif ($aiResult)
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 mr-1.5"></span>
                            Draft AI
                        </span>
                    @endif
                </div>

                {{-- Loading khusus ANALYZE & PUBLISH --}}
                <div wire:loading wire:target="analyze,publish"
                    class="flex flex-col items-center justify-center text-center gap-3 py-10">
                    <div class="mb-2 text-amber-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-10 h-10 animate-pulse">
                            <path fill-rule="evenodd"
                                d="M9.352 3.356a.75.75 0 0 1 .53-.33 13.1 13.1 0 0 1 4.236 0 .75.75 0 0 1 .53.33l1.841 2.764 3.233.678a.75.75 0 0 1 .472 1.16l-2.02 2.703.248 3.293a.75.75 0 0 1-1.02.74l-3.06-1.23-3.06 1.23a.75.75 0 0 1-1.02-.74l.249-3.293-2.02-2.704a.75.75 0 0 1 .472-1.159l3.232-.678 1.842-2.764Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="text-slate-900 font-medium">
                        AI sedang menyusun cerita dan caption...
                    </p>
                    <p class="text-xs text-slate-500 max-w-sm">
                        Mohon tunggu sebentar, proses bergantung pada model visi &amp; bahasa.
                    </p>
                </div>

                {{-- KONTEN UTAMA --}}
                <div wire:loading.remove wire:target="analyze,publish" class="space-y-5">

                    {{-- ======================= 1. SUDAH PUBLISH ======================= --}}
                    @if ($story)
                        {{-- header motif + foto --}}
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex-1">
                                <p class="text-xs text-slate-500">
                                    Cerita dipublikasikan pada
                                    {{ optional($story->created_at)->format('d M Y, H:i') }}
                                </p>
                                <h3 class="text-xl font-semibold text-slate-900 mt-1">
                                    {{ $story->detected_motif ?? 'Motif terdeteksi' }}
                                </h3>
                            </div>

                            <div class="flex items-center gap-3">
                                @if ($story->image_path)
                                    <div class="text-center">
                                        <p class="text-[10px] text-slate-400 mb-1">Foto produk</p>
                                        <img src="{{ asset('storage/' . $story->image_path) }}"
                                            class="w-16 h-16 object-cover rounded-xl border border-slate-200"
                                            alt="Uploaded Image">
                                    </div>
                                @endif
                                @if ($story->qr_code_path)
                                    <div class="text-center group relative">
                                        <p class="text-[10px] text-slate-400 mb-1">QR Cerita</p>
                                        <div class="relative">
                                            <img id="qr-image" src="{{ asset('storage/' . $story->qr_code_path) }}"
                                                class="w-16 h-16 rounded-xl border border-slate-200 bg-white"
                                                alt="QR Code">
                                            {{-- Download Button (Hover) --}}
                                            <button
                                                onclick="downloadQr('{{ asset('storage/' . $story->qr_code_path) }}', '{{ $story->detected_motif }}-QR.png')"
                                                class="absolute -bottom-2 -right-2 bg-amber-600 text-white p-1.5 rounded-full shadow-md hover:bg-amber-700 transition-transform hover:scale-110"
                                                title="Download QR Code">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0L8 8m4-4v12">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Caption & Cerita: Satu kolom, bertumpuk --}}
                        <div class="space-y-4 mt-3">
                            {{-- Caption promosi --}}
                            <section class="space-y-2">
                                <div class="flex items-center justify-between gap-2">
                                    <p class="text-[11px] font-semibold text-amber-800 uppercase tracking-wide">
                                        Caption promosi untuk UMKM
                                    </p>
                                    {{-- Tombol copy icon --}}
                                    <button type="button"
                                        class="inline-flex items-center gap-1 rounded-full px-3 py-1 text-[11px] font-medium border border-amber-200 text-amber-800 hover:bg-amber-50"
                                        onclick="copyCaption(@js($story->narrative))">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="w-3.5 h-3.5">
                                            <rect x="9" y="9" width="13" height="13" rx="2"
                                                ry="2" />
                                            <path d="M5 15H4a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h9a2 2 0 0 1 2 2v1" />
                                        </svg>
                                        <span>Salin caption</span>
                                    </button>
                                </div>
                                <div
                                    class="rounded-2xl border border-amber-100 bg-amber-50 px-3 py-2 text-sm md:text-[15px] text-slate-900 whitespace-pre-line">
                                    {{ $story->narrative }}
                                </div>
                            </section>

                            {{-- Cerita budaya --}}
                            <section class="space-y-2">
                                <p class="text-[11px] font-semibold text-amber-800 uppercase tracking-wide">
                                    Cerita budaya / sejarah produk
                                </p>
                                @if (!empty($story->caption))
                                    <div
                                        class="rounded-2xl border border-amber-100 bg-amber-50 px-3 py-2 text-sm md:text-[15px] text-slate-900 whitespace-pre-line">
                                        {{ $story->caption }}
                                    </div>
                                @else
                                    <p class="text-xs text-slate-400">
                                        Cerita budaya belum disimpan untuk cerita ini.
                                    </p>
                                @endif
                            </section>
                        </div>

                        <div class="pt-1">
                            <a href="{{ route('stories.public.show', $story->public_id) }}"
                                class="inline-flex items-center text-sm text-amber-700 hover:text-amber-800 underline">
                                Lihat halaman cerita publik
                            </a>
                        </div>

                        {{-- ======================= 2. DRAFT AI ========================== --}}
                    @elseif ($aiResult)
                        @php
                            $context =
                                data_get($aiResult, 'context') ?? (data_get($aiResult, 'philosophical_context') ?? '');
                        @endphp

                        {{-- header motif + preview foto --}}
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex-1">
                                <p class="text-xs text-slate-500">
                                    Hasil analisis awal &mdash; belum dipublikasikan
                                </p>
                                <h3 class="text-xl font-semibold text-slate-900 mt-1">
                                    {{ $aiResult['detected_motif'] ?? 'Motif terdeteksi' }}
                                </h3>

                                {{-- meta kecil --}}
                                <div class="flex flex-wrap gap-3 mt-2 text-[11px] text-slate-500">
                                    @if (!empty($aiResult['category']))
                                        <span>
                                            <span class="font-semibold text-slate-700">Kategori:</span>
                                            {{ $aiResult['category'] }}
                                        </span>
                                    @endif

                                    @if (!empty($aiResult['source']))
                                        <span>
                                            <span class="font-semibold text-slate-700">Sumber:</span>
                                            {{ $aiResult['source'] }}
                                        </span>
                                    @endif

                                    @if (!empty($aiResult['language_label']))
                                        <span>
                                            <span class="font-semibold text-slate-700">Bahasa &amp; gaya:</span>
                                            {{ $aiResult['language_label'] }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            @if ($image)
                                <div class="text-center shrink-0">
                                    <p class="text-[10px] text-slate-400 mb-1">Preview foto</p>
                                    <img src="{{ $image->temporaryUrl() }}"
                                        class="w-20 h-20 object-cover rounded-xl border border-slate-200"
                                        alt="Preview Image">
                                </div>
                            @endif
                        </div>

                        {{-- Caption & Cerita: vertikal, jelas --}}
                        <div class="space-y-4 mt-3">
                            {{-- Cerita budaya (philosophical_context / context) --}}
                            <section class="space-y-2">
                                <div class="flex items-center justify-between gap-2">
                                    <p class="text-[11px] font-semibold text-amber-800 uppercase tracking-wide">
                                        Draft cerita budaya / filosofi produk
                                    </p>

                                    @if (!empty($context) && !empty($aiResult['narrative']))
                                        @php
                                            // Gabungkan caption promosi + context jadi satu text
                                            $captionToCopy = ($context ?? '') . "\n\n" . ($aiResult['narrative'] ?? '');
                                        @endphp
                                        <button type="button"
                                            class="inline-flex items-center gap-1 rounded-full px-3 py-1 text-[11px] font-medium border border-amber-200 text-amber-800 hover:bg-amber-50"
                                            onclick="copyCaption(@js($captionToCopy))">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5">
                                                <rect x="9" y="9" width="13" height="13" rx="2"
                                                    ry="2" />
                                                <path d="M5 15H4a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h9a2 2 0 0 1 2 2v1" />
                                            </svg>
                                            <span>Salin Semua</span>
                                        </button>
                                    @endif
                                </div>

                                @if ($context)
                                    <div
                                        class="rounded-2xl border border-amber-100 bg-amber-50 px-3 py-5 text-sm md:text-[15px] text-slate-900  max-h-60 overflow-y-auto">
                                        {{ $context }}
                                    </div>
                                @else
                                    <p class="text-xs text-slate-400">
                                        Cerita belum tersedia (context tidak ditemukan).
                                    </p>
                                @endif
                            </section>

                            {{-- Caption promosi (narrative) --}}
                            <section class="space-y-2">
                                <div class="flex items-center justify-between gap-2">
                                    <p class="text-[11px] font-semibold text-amber-800 uppercase tracking-wide">
                                        Draft caption promosi
                                    </p>
                                </div>

                                @if (!empty($aiResult['narrative']))
                                    <div
                                        class="rounded-2xl border border-amber-100 bg-amber-50 px-3 py-5  text-sm md:text-[15px] text-slate-900  max-h-60 overflow-y-auto">
                                        {{ $aiResult['narrative'] }}
                                    </div>
                                @else
                                    <p class="text-xs text-slate-400">
                                        Caption belum dihasilkan oleh AI.
                                    </p>
                                @endif
                            </section>
                        </div>

                        {{-- Tombol Publish --}}
                        <div class="flex justify-end pt-2">
                            <button type="button" wire:click="publish"
                                class="inline-flex items-center px-5 py-2 rounded-full text-sm font-semibold
                                       bg-amber-600 text-white hover:bg-amber-700 transition
                                       disabled:opacity-60 disabled:cursor-not-allowed"
                                wire:loading.attr="disabled" wire:target="publish">
                                Publish Cerita &amp; Buat QR
                            </button>
                        </div>

                        {{-- ======================= 3. ERROR / STATE AWAL ================= --}}
                    @elseif ($errorMessage)
                        <div class="text-sm text-rose-600">
                            {{ $errorMessage }}
                        </div>
                    @else
                        <div class="flex flex-col items-center justify-center text-center py-10">
                            <div class="mb-4 text-amber-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-12 h-12">
                                    <path fill-rule="evenodd"
                                        d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813a3.75 3.75 0 0 0 2.576-2.576l.813-2.846A.75.75 0 0 1 9 4.5ZM9 15a.75.75 0 0 1 .75.75v1.5h1.5a.75.75 0 0 1 0 1.5h-1.5v1.5a.75.75 0 0 1-1.5 0v-1.5h-1.5a.75.75 0 0 1 0-1.5h1.5v-1.5A.75.75 0 0 1 9 15ZM15 9a.75.75 0 0 1 .75.75v1.5h1.5a.75.75 0 0 1 0 1.5h-1.5v1.5a.75.75 0 0 1-1.5 0v-1.5h-1.5a.75.75 0 0 1 0-1.5h1.5v-1.5A.75.75 0 0 1 15 9Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>

                            <p class="text-slate-900 font-medium">
                                Unggah foto, klik <span class="font-semibold">Buat Carita</span>, lalu lihat
                                draft cerita dan caption di sini.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </div>

    {{-- TOAST COPY CAPTION --}}
    <div id="copy-toast"
        class="fixed inset-x-0 bottom-6 flex justify-center z-50 pointer-events-none opacity-0 translate-y-3 transform transition duration-200 ease-out">
        <div
            class="pointer-events-auto inline-flex items-center gap-2 rounded-full bg-slate-900/95 text-amber-50 px-4 py-2 shadow-lg border border-amber-500/50">
            <span
                class="inline-flex items-center justify-center rounded-full bg-amber-400 text-slate-900 p-1.5 shadow-sm">
                {{-- icon check / clipboard --}}
                <svg xmlns="http://www.w3.org/200/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                    <polyline points="20 6 9 17 4 12" />
                </svg>
            </span>
            <p id="copy-toast-text" class="text-xs md:text-sm font-medium">
                Caption berhasil disalin
            </p>
        </div>
    </div>

    {{-- SACRED MOTIF MODAL --}}
    @if ($showSacredModal)
        <div class="fixed inset-0 z-[100] flex items-center justify-center px-4 sm:px-6" x-data
            x-init="$nextTick(() => { document.body.classList.add('overflow-hidden'); });"
            @keydown.escape.window="document.body.classList.remove('overflow-hidden'); $wire.set('showSacredModal', false)">

            {{-- Backdrop --}}
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"
                wire:click="$set('showSacredModal', false)"
                @click="document.body.classList.remove('overflow-hidden')"></div>

            {{-- Modal Content --}}
            <div
                class="relative bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 md:p-8 text-center transform transition-all scale-100">
                <div
                    class="w-16 h-16 bg-rose-100 text-rose-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                    </svg>
                </div>

                <h3 class="text-xl font-bold text-slate-900 mb-2">Motif Sakral Terdeteksi tidak bisa di perjual belikan
                </h3>
                <p class="text-slate-600 text-sm leading-relaxed mb-6">
                    {{ 'Motif ini memiliki nilai sakral yang tinggi dan dilindungi oleh adat. Penggunaan untuk tujuan komersial mungkin dibatasi atau dilarang.' }}
                </p>

                <div class="flex flex-col gap-3">
                    <button wire:click="$set('showSacredModal', false)"
                        @click="document.body.classList.remove('overflow-hidden')"
                        class="w-full py-2.5 bg-slate-900 text-white font-semibold rounded-xl hover:bg-slate-800 transition-colors">
                        Mengerti
                    </button>
                    <button wire:click="$set('showSacredModal', false)"
                        @click="document.body.classList.remove('overflow-hidden')"
                        class="w-full py-2.5 text-slate-500 font-medium hover:text-slate-700 transition-colors">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    @endif

    {{-- Script copy caption + popup + download QR --}}
    <script>
        let copyToastTimeout = null;

        function showCopyToast(message) {
            const toast = document.getElementById('copy-toast');
            const textEl = document.getElementById('copy-toast-text');

            if (!toast || !textEl) return;

            textEl.textContent = message || 'Caption berhasil disalin';

            // tampilkan toast
            toast.classList.remove('opacity-0', 'translate-y-3');
            toast.classList.add('opacity-100', 'translate-y-0');

            // reset timeout jika sebelumnya masih jalan
            if (copyToastTimeout) {
                clearTimeout(copyToastTimeout);
            }

            // otomatis hilang setelah 1.8 detik
            copyToastTimeout = setTimeout(() => {
                toast.classList.remove('opacity-100', 'translate-y-0');
                toast.classList.add('opacity-0', 'translate-y-3');
            }, 1800);
        }

        function copyCaption(text) {
            if (!text) return;

            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text);
            } else {
                // fallback untuk browser lama
                const textarea = document.createElement('textarea');
                textarea.value = text;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);
            }

            showCopyToast('Caption berhasil disalin');
        }

        function downloadQr(url, filename) {
            // Create a temporary canvas to convert SVG to PNG
            const img = new Image();
            img.crossOrigin = "Anonymous";
            img.onload = function() {
                const canvas = document.createElement('canvas');
                canvas.width = img.width;
                canvas.height = img.height;
                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0);

                // Convert to PNG data URL
                const pngUrl = canvas.toDataURL('image/png');

                // Trigger download
                const a = document.createElement('a');
                a.href = pngUrl;
                a.download = filename;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            };
            img.src = url;
        }
    </script>
</div>
