<?php

namespace App\Services;

use App\Models\GeneratedStory;
use App\Models\AuditLog;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// Tambahan import dari bacon/bacon-qr-code:
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class StoryService
{
    public function createStoryFromAiResult(UploadedFile $image, array $aiResult): GeneratedStory
    {
        $user = Auth::user();

        // 1. Simpan gambar upload
        $imagePath = $image->store('stories/images', 'public');

        // 2. Simpan story dulu (tanpa QR)
        $story = GeneratedStory::create([
            'user_id'          => $user->id,
            'image_path'       => $imagePath,
            'detected_motif'   => $aiResult['detected_motif'] ?? null,
            'narrative'        => $aiResult['narrative'] ?? '',
            'caption'          => $aiResult['caption'] ?? null,
            'source_chunk_ids' => $aiResult['source_chunk_ids'] ?? [],
        ]);

        // 3. Generate QR pakai BaconQrCode (SVG)
        $url = route('stories.public.show', $story->public_id);

        $renderer = new ImageRenderer(
            new RendererStyle(400),        // ukuran QR
            new SvgImageBackEnd()          // output SVG (nggak perlu imagick)
        );

        $writer = new Writer($renderer);
        $qrSvg  = $writer->writeString($url);   // hasilnya string SVG

        $qrPath = 'stories/qr/' . Str::uuid() . '.svg';
        Storage::disk('public')->put($qrPath, $qrSvg);

        // 4. Update story dengan path QR
        $story->update([
            'qr_code_path' => $qrPath,
        ]);

        // 5. Audit log
        AuditLog::create([
            'user_id'    => $user->id,
            'action'     => 'generate_story',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'details'    => [
                'story_id'       => $story->id,
                'public_id'      => $story->public_id,
                'detected_motif' => $story->detected_motif,
            ],
        ]);

        return $story;
    }
}
