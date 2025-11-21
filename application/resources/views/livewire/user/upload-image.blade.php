<div class="bg-white mx-auto px-4 sm:px-6 lg:px-8 xl:px-[10%] lg:h-screen py-25 flex flex-col justify-center bg-cover bg-center"
    style="background-image: url('bg.svg')">
    {{-- Heading --}}
    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8">
        Coba Langsung: Kenali Motif di Sekitar Anda
    </h1>

    {{-- Grid Container (Responsif: 1 kolom di HP, 2 kolom di Desktop) --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 h-auto md:h-[450px]">

        {{-- Kiri: Upload Card --}}
        <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col min-h-[250px]">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Unggah Foto Batik atau Kriya Anda</h2>

            {{-- Area Upload (Dashed Border) --}}
            <div
                class="flex-1 border-2 border-dashed border-gray-300 rounded-xl hover:bg-gray-50 transition relative group">
                <input type="file" id="file-upload" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                    onchange="previewFile()">

                <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-6">
                    {{-- Icon Upload --}}
                    <div class="mb-4 text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-12 h-12">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                        </svg>
                    </div>

                    <p class="text-gray-900 font-bold text-base mb-1 group-hover:text-carita transition">
                        Klik untuk memilih foto
                    </p>
                    <p class="text-gray-500 text-sm" id="file-name">
                        Format: JPG, PNG (Maks. 5MB)
                    </p>
                </div>
            </div>
        </div>

        {{-- Kanan: Hasil Analisis AI --}}
        <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col min-h-[250px]">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Hasil Cerita</h2>

            {{-- Content Placeholder --}}
            <div class="flex-1 flex flex-col items-center justify-center text-center h-full ">
                {{-- Icon Sparkles (AI) --}}
                <div class="mb-4 text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12">
                        <path fill-rule="evenodd"
                            d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813a3.75 3.75 0 0 0 2.576-2.576l.813-2.846A.75.75 0 0 1 9 4.5ZM9 15a.75.75 0 0 1 .75.75v1.5h1.5a.75.75 0 0 1 0 1.5h-1.5v1.5a.75.75 0 0 1-1.5 0v-1.5h-1.5a.75.75 0 0 1 0-1.5h1.5v-1.5A.75.75 0 0 1 9 15ZM15 9a.75.75 0 0 1 .75.75v1.5h1.5a.75.75 0 0 1 0 1.5h-1.5v1.5a.75.75 0 0 1-1.5 0v-1.5h-1.5a.75.75 0 0 1 0-1.5h1.5v-1.5A.75.75 0 0 1 15 9Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>

                <p class="text-gray-900 font-medium">
                    Unggah foto untuk melihat cerita budayanya
                </p>
            </div>
        </div>

    </div>

    <script>
        // Script sederhana untuk mengubah teks saat file dipilih
        function previewFile() {
            const input = document.getElementById('file-upload');
            const fileNameDisplay = document.getElementById('file-name');

            if (input.files && input.files[0]) {
                fileNameDisplay.textContent = "File terpilih: " + input.files[0].name;
                fileNameDisplay.classList.add("text-green-600", "font-semibold");
            }
        }
    </script>

</div>
