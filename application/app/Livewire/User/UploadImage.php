<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\StoryService;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Services\AiStoryService;

#[Title('Upload Image')]
#[Layout('layouts.app')]
class UploadImage extends Component
{
    use WithFileUploads;

    public $image;
    public $isLoading = false;
    public $errorMessage;

    public $aiResult = null; // hasil mentah dari AI (preview saja)
    public $story = null;    // GeneratedStory yang sudah dipublish

    protected $rules = [
        'image' => 'required|image|max:5120', // 5MB
    ];

    public function render()
    {
        return view('livewire.user.upload-image');
    }

    /**
     * Tahap 1: Analisa gambar dengan AI (tanpa simpan, tanpa QR)
     */
    public function analyze(AiStoryService $aiStoryService)
    {
        $this->validate();
        $this->reset(['errorMessage', 'aiResult', 'story']); // reset hasil lama
        $this->isLoading = true;

        try {
            $aiResult = $aiStoryService->generateFromImage($this->image);

            // Guardrail sakral
            if (! empty($aiResult['is_sacred']) && $aiResult['is_sacred'] === true) {
                $this->errorMessage = 'Motif ini ditandai sebagai [Sakral] dan tidak dapat digunakan untuk tujuan komersial.';
                return;
            }

            // SIMPAN sementara hasil AI di state (belum ke DB)
            $this->aiResult = $aiResult;
        } catch (\Throwable $e) {
            report($e);
            $this->errorMessage = 'Terjadi kesalahan saat memproses gambar. Silakan coba lagi.';
        } finally {
            $this->isLoading = false;
        }
    }

    /**
     * Tahap 2: Publish cerita (simpan ke DB + generate QR)
     */
    public function publish(StoryService $storyService)
    {
        $this->reset('errorMessage');

        // Pastikan sudah ada hasil AI & file
        if (! $this->image || ! $this->aiResult) {
            $this->errorMessage = 'Silakan unggah dan proses gambar dengan AI terlebih dahulu.';
            return;
        }

        try {
            $this->isLoading = true;

            // Simpan story + QR memakai StoryService
            $this->story = $storyService->createStoryFromAiResult(
                $this->image,
                $this->aiResult
            );

            // Setelah publish, kita bisa reset image & aiResult
            $this->reset(['image', 'aiResult']);
        } catch (\Throwable $e) {
            report($e);
            $this->errorMessage = 'Gagal menyimpan cerita. Silakan coba lagi.';
        } finally {
            $this->isLoading = false;
        }
    }
}