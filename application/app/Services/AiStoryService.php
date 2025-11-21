<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

class AiStoryService
{
    public function generateFromImage(
        UploadedFile $image,
        string $captionLanguage = 'id_umkm',
        ?string $customLanguage = null
    ): array {
        $base = rtrim(config('services.carita_ai.endpoint'), '/');

        // 1. ANALYZE
        $analyzeResponse = Http::timeout(40)
            ->attach(
                'image',
                file_get_contents($image->getRealPath()),
                $image->getClientOriginalName()
            )
            ->post($base . '/analyze');

        if (!$analyzeResponse->successful()) {
            throw new \RuntimeException('Gagal menghubungi AI service (/analyze)');
        }

        $analyze = $analyzeResponse->json();

        if (($analyze['status'] ?? null) === 'blocked') {
            return [
                'is_sacred'        => true,
                'warning'          => $analyze['warning'] ?? 'Motif sakral.',
                'detected_motif'   => null,
                'narrative'        => '',
                'caption'          => null,
                'source_chunk_ids' => [],
            ];
        }

        if (($analyze['status'] ?? null) !== 'success') {
            throw new \RuntimeException('Analisis gambar gagal di AI service');
        }

        $data        = $analyze['data'] ?? [];
        $motifName   = $data['motif_name'] ?? null;
        $contextText = $data['philosophical_context'] ?? '';
        $source      = $data['source'] ?? 'CARITA knowledge base';

        // 🟡 Bikin label untuk UI + string bahasa untuk backend
        $languageLabel    = $this->buildLanguageLabel($captionLanguage, $customLanguage);
        $backendLanguage  = $this->mapCaptionLanguageToBackend($captionLanguage, $customLanguage);

        // 2. COMPOSE STORY
        $composePayload = [
            'motif_name'   => $motifName,
            'context_data' => $contextText,
            'source'       => $source,
            'language'     => $backendLanguage,
        ];

        $composeResponse = Http::timeout(60)
            ->post($base . '/compose-story', $composePayload);

        if (!$composeResponse->successful()) {
            throw new \RuntimeException('Gagal menghubungi AI service (/compose-story)');
        }

        $compose = $composeResponse->json();

        if (($compose['status'] ?? null) !== 'success') {
            throw new \RuntimeException('Gagal menyusun cerita di AI service');
        }

        $storyPayload   = $compose['story'] ?? null;
        $narrative      = '';
        $caption        = null;
        $sourceChunkIds = [];

        if (is_array($storyPayload)) {
            $narrative      = $storyPayload['narrative'] ?? ($storyPayload['story'] ?? '');
            $caption        = $storyPayload['caption'] ?? null;
            $sourceChunkIds = $storyPayload['source_chunk_ids'] ?? [];
        } else {
            $narrative = (string) $storyPayload;
        }

        return [
            'is_sacred'        => false,
            'detected_motif'   => $motifName,
            'narrative'        => $narrative,
            'caption'          => $caption,
            'source_chunk_ids' => $sourceChunkIds,
            'category'         => $data['category'] ?? null,
            'confidence'       => $data['confidence'] ?? null,
            'context'          => $contextText,
            'source'           => $source,

            'language_code'    => $captionLanguage,
            'language_label'   => $languageLabel,

            'raw' => [
                'analyze'       => $analyze,
                'compose_story' => $compose,
            ],
        ];
    }

    protected function buildLanguageLabel(string $code, ?string $customLanguage): string
    {
        return match ($code) {
            'id'   => 'Indonesia – Santai untuk caption UMKM',
            // 'id_formal' => 'Indonesia – Formal / katalog produk',
            'su'        => 'Bahasa Sunda',
            'en'        => 'Inggris',

            default     => 'Indonesia ',
        };
    }

    protected function mapCaptionLanguageToBackend(string $code, ?string $customLanguage): string
    {
        // Ini yang benar-benar dikirim ke Flask sebagai "language"
        return match ($code) {
            'id'   => 'Indonesia',
            // 'id_formal' => 'Bahasa Indonesia formal seperti katalog produk',
            'su'        => 'Sunda',
            'en'        => 'Inggris',

            default     => 'Indonesia',
        };
    }
}
