<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Kolom yang boleh di-mass assign
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'price',
        'main_image_path',
        'generated_story_id',
        'is_published',
    ];

    // Casting tipe data
    protected $casts = [
        'price'        => 'integer',
        'stock'        => 'integer',
        'is_published' => 'boolean',
    ];

    /**
     * Relasi ke pemilik produk (User / UMKM owner)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke GeneratedStory (hangtag QR Cerita)
     */
    public function generatedStory()
    {
        return $this->belongsTo(GeneratedStory::class);
    }

    /**
     * (Opsional) Kalau nanti routing produk mau pakai slug:
     * Route model binding akan pakai 'slug' instead of 'id'
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * (Opsional) Scope produk yang sudah dipublish.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
