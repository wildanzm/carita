<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Relasi ke UMKM pemilik produk
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            // Data dasar produk
            $table->string('name');          // nama produk
            $table->string('slug');          // slug produk, nanti digabung dengan slug UMKM di route

            // Deskripsi jualan
            $table->longText('description')->nullable();          // detail di halaman produk

            // Harga & stok
            $table->unsignedBigInteger('price')->nullable();   // atau pakai decimal kalau mau

            // Foto utama
            $table->string('main_image_path')->nullable();

            // 🔗 HANGTAG: relasi ke generated_stories (QR Cerita)
            $table->foreignId('generated_story_id')
                ->nullable()
                ->constrained('generated_stories')
                ->nullOnDelete();

            // Status publish
            $table->boolean('is_published')->default(false);

            $table->timestamps();

            // Slug unik per UMKM (jadi 2 UMKM boleh punya slug sama, tapi 1 UMKM tidak)
            $table->unique(['user_id', 'slug']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
