<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

class AiStoryService
{
    public function generateFromImage(UploadedFile $image): array
    {

        $endpoint = config('services.carita_ai.endpoint') . '/generate-from-image';

        $response = Http::timeout(20)
            ->attach('image', file_get_contents($image->getRealPath()), $image->getClientOriginalName())
            ->post($endpoint);

        if (! $response->successful()) {
            throw new \RuntimeException('Gagal menghubungi AI service');
        }

        // Contoh struktur response dari Flask (silakan sesuaikan)
        // {
        //   "detected_motif": "Batik Gedong Gincu",
        //   "narrative": "Teks 150-250 kata...",
        //   "source_chunk_ids": [1, 5, 12],
        //   "is_sacred": false
        // }
        return $response->json();
    }
}