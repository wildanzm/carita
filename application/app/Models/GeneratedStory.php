<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class GeneratedStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'public_id',
        'user_id',
        'image_path',
        'poster_path',
        'detected_motif',
        'narrative',
        'caption',
        'qr_code_path',
        'source_chunk_ids',
    ];

    protected $casts = [
        'source_chunk_ids' => 'array', // Ubah JSON IDs ke Array PHP
    ];

    /**
     * Boot function to auto-generate UUID when creating.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->public_id)) {
                $model->public_id = (string) Str::uuid();
            }
        });
    }

    /**
     * Get the user that owns the story.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
