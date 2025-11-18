<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. TABEL CULTURAL CHUNKS ("Otak" Pengetahuan)
        Schema::create('cultural_chunks', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index(); // Judul chunk
            $table->text('content'); // Narasi budaya lengkap
            $table->json('embedding')->nullable(); // Vektor AI (disimpan sebagai JSON array)
            $table->string('category', 50)->index(); // e.g. 'Batik', 'Sakral', 'Tradisi'
            $table->string('citation')->nullable(); // Sumber referensi (Wawancara, Buku)
            $table->boolean('is_sacred')->default(false)->index(); // Guardrail flag (Penting!)
            $table->softDeletes(); // Agar data riset tidak hilang permanen jika terhapus
            $table->timestamps();
        });

        // 2. TABEL GENERATED STORIES ("Output" Cerita User)
        Schema::create('generated_stories', function (Blueprint $table) {
            $table->id();
            $table->uuid('public_id')->unique(); // URL aman: carita.id/s/{uuid}
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('image_path'); // Lokasi file foto yang diupload
            $table->string('detected_motif')->nullable(); // Hasil deteksi Vision AI
            $table->text('narrative'); // Cerita yang dihasilkan AI
            $table->string('qr_code_path')->nullable(); // Path file QR Code

            // Menyimpan ID dari cultural_chunks yang dipakai untuk traceabilitas
            $table->json('source_chunk_ids')->nullable();

            $table->timestamps();
        });

        // 3. TABEL AUDIT LOGS (Keamanan & Etika)
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('action')->index(); // e.g. 'GENERATE_STORY', 'BLOCKED_SACRED'
            $table->ipAddress('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->json('details')->nullable(); // Data konteks tambahan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
        Schema::dropIfExists('generated_stories');
        Schema::dropIfExists('cultural_chunks');
    }
};
