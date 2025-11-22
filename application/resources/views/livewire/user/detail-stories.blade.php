<div class="min-h-screen bg-[#FDFBF7] font-sans selection:bg-amber-200 selection:text-amber-900">
    {{-- Navbar Simple --}}
    <nav class="absolute top-0 w-full z-50 px-6 py-6 flex justify-between items-center">
        <a href="{{ route('home') }}" class="flex items-center gap-2 group">
            <div
                class="w-10 h-10 bg-amber-900 text-amber-50 rounded-full flex items-center justify-center font-serif font-bold text-xl shadow-lg group-hover:scale-105 transition-transform">
                C
            </div>
            <span class="font-serif text-xl font-bold text-amber-900 tracking-tight">Carita</span>
        </a>
        {{-- Optional: Share Button --}}
        <button onclick="navigator.share({title: '{{ $story->detected_motif }}', url: window.location.href})"
            class="w-10 h-10 rounded-full bg-white/80 backdrop-blur-sm border border-amber-100 text-amber-900 flex items-center justify-center hover:bg-amber-50 transition-colors shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-5.367 3 3 0 00-5.367 5.367zm0 10.734a3 3 0 105.367-5.367 3 3 0 00-5.367 5.367z">
                </path>
            </svg>
        </button>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-28 pb-16">
        <div class="grid lg:grid-cols-[1fr_1.2fr] gap-12 lg:gap-20 items-start">
            {{-- Left Column: Image --}}
            <div class="relative group perspective-1000">
                <div
                    class="absolute inset-0 bg-amber-900/5 rounded-[2rem] transform rotate-3 scale-[0.98] transition-transform group-hover:rotate-2">
                </div>
                <div
                    class="relative rounded-[2rem] overflow-hidden shadow-[0_20px_50px_-12px_rgba(120,53,15,0.25)] border-4 border-white bg-white">
                    <img src="{{ Storage::url($story->image_path) }}" alt="{{ $story->detected_motif }}"
                        class="w-full aspect-[1] object-cover hover:scale-105 transition-transform duration-700 ease-out">

                    {{-- Overlay Gradient for text readability if needed, though we keep it clean --}}
                    <div class="absolute inset-0 pointer-events-none shadow-inner rounded-[2rem]"></div>
                </div>

                {{-- Category Tag Floating --}}
                @if ($story->category)
                <div
                    class="absolute -bottom-6 left-1/2 -translate-x-1/2 bg-white/95 backdrop-blur px-6 py-3 rounded-full shadow-lg border border-amber-100 flex items-center gap-2 whitespace-nowrap">
                    <span class="w-2 h-2 rounded-full bg-amber-600 animate-pulse"></span>
                    <span class="text-sm font-bold text-amber-900 uppercase tracking-wider">{{ $story->category }}</span>
                </div>
                @endif
            </div>

            {{-- Right Column: Story & Details --}}
            <div class="space-y-10 pt-4">
                {{-- Header --}}
                <div class="space-y-4 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-100/50 border border-amber-200 text-amber-800 text-xs font-semibold uppercase tracking-widest">
                        <span>Terverifikasi Original</span>
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    </div>
                    
                    <h1 class="font-serif text-5xl lg:text-6xl font-bold text-amber-950 leading-[1.1]">
                        {{ $story->detected_motif }}
                    </h1>
                    
                    <div class="flex items-center justify-center lg:justify-start gap-4 text-amber-800/60 font-medium">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $story->created_at->format('d M Y') }}
                        </span>
                        <span>&bull;</span>
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Oleh {{ $story->user->name }}
                        </span>
                    </div>
                </div>

                {{-- Philosophical Narrative --}}
                <div class="relative">
                    <span class="absolute -top-8 -left-4 text-9xl font-serif text-amber-100 select-none z-0">“</span>
                    <div class="relative z-10 prose prose-lg prose-amber max-w-none">
                        <h3 class="font-serif text-2xl font-bold text-amber-900 mb-4 flex items-center gap-3">
                            <span class="w-8 h-[1px] bg-amber-400"></span>
                            Makna & Filosofi
                        </h3>
                        <div class="text-slate-600 leading-loose text-lg whitespace-pre-line font-serif">
                            {{ $story->narrative }}
                        </div>
                    </div>
                </div>

                {{-- Promotional Caption / Product Context --}}
                @if($story->caption)
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-amber-100/50 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-amber-50 to-transparent rounded-bl-full"></div>
                    
                    <h4 class="font-bold text-amber-900 mb-3 uppercase tracking-wide text-sm">Tentang Produk Ini</h4>
                    <p class="text-slate-600 italic leading-relaxed">
                        "{{ $story->caption }}"
                    </p>
                </div>
                @endif

                {{-- Seller / UMKM Profile & CTA --}}
                <div class="border-t border-amber-200/50 pt-8 flex flex-col sm:flex-row items-center justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-full bg-amber-100 flex items-center justify-center text-amber-800 font-bold text-xl border-2 border-white shadow-md">
                            {{ substr($story->user->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-xs text-amber-600 font-bold uppercase tracking-wider mb-0.5">Pengrajin / Galeri</p>
                            <h4 class="text-lg font-bold text-slate-900">{{ $story->user->name }}</h4>
                            @if($story->user->username)
                            <p class="text-sm text-slate-500">{{ '@' . $story->user->username }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="flex gap-3 w-full sm:w-auto">
                        @if($story->user->phone)
                        <a href="https://wa.me/{{ $story->user->phone }}?text=Halo, saya tertarik dengan produk {{ $story->detected_motif }} yang saya lihat di Carita." 
                           target="_blank"
                           class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 bg-[#25D366] hover:bg-[#20bd5a] text-white px-6 py-3 rounded-full font-bold transition-all shadow-lg shadow-green-200 hover:shadow-green-300 transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            WhatsApp
                        </a>
                        @endif
                        
                        @if(Auth::check() && Auth::id() === $story->user_id)
                        <a href="{{ route('my-stories') }}" class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 bg-slate-900 hover:bg-slate-800 text-white px-6 py-3 rounded-full font-bold transition-all shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            My Stories
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Footer / Powered By --}}
        <div class="mt-20 pt-10 border-t border-amber-100 text-center">
            <p class="text-amber-800/40 text-sm font-medium flex items-center justify-center gap-2">
                <span class="uppercase tracking-widest text-[10px]">Powered by</span>
                <span class="font-serif font-bold text-lg text-amber-900/60">Carita AI</span>
            </p>
        </div>
    </div>
</div>
