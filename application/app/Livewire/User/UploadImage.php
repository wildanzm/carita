<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\StoryService;
use App\Services\AiStoryService;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Upload Image')]
#[Layout('layouts.app')]
class UploadImage extends Component
{
    use WithFileUploads;

    public $image;
    public bool $isLoading = false;
    public ?string $errorMessage = null;

    public ?array $aiResult = null;
    public $story = null;

    public string $captionLanguage = 'id';
    public ?string $customLanguage = null;

    protected function rules(): array
    {
        return [
            'image'           => 'required|image|max:5120', // 5MB
            'captionLanguage' => 'required|in:id,santai,su,en',
            // wajib diisi kalau pilih custom
            'customLanguage'  => 'nullable|string|max:150|required_if:captionLanguage,custom',
        ];
    }

    public function render()
    {
        return view('livewire.user.upload-image');
    }

    public $showSacredModal = false;
    public $showPosterModal = false;
    public $isGeneratingPoster = false;

    public ?string $posterUrl = null;

    public function updatedImage()
    {
        // Reset hasil lama, tapi TIDAK reset captionLanguage (biar pilihan user tetap)
        $this->reset(['aiResult', 'story', 'errorMessage', 'showSacredModal', 'posterUrl', 'showPosterModal', 'isGeneratingPoster']);
    }

    public function analyze(AiStoryService $aiStoryService)
    {
        // Validasi image + captionLanguage (+ custom kalau perlu)
        $this->validate();

        $this->reset(['errorMessage', 'aiResult', 'story', 'showSacredModal', 'posterUrl']); // reset hasil lama
        $this->isLoading = true;

        try {
            // kirim juga pilihan bahasa ke service AI
            $aiResult = $aiStoryService->generateFromImage(
                $this->image,
                $this->captionLanguage,
                $this->customLanguage
            );

            if (!empty($aiResult['is_sacred']) && $aiResult['is_sacred'] === true) {
                $this->errorMessage = $aiResult['warning']
                    ?? 'Motif ini ditandai sebagai [Sakral] dan tidak dapat digunakan untuk tujuan komersial.';
                $this->showSacredModal = true;
                return;
            }

            $this->aiResult = $aiResult;
            
            // Set flag untuk generate poster di background (via frontend polling/trigger)
            if (!empty($aiResult['detected_motif'])) {
                $this->isGeneratingPoster = true;
            }

        } catch (\Throwable $e) {
            report($e);
            $this->errorMessage = 'Terjadi kesalahan saat memproses gambar. Silakan coba lagi.';
        } finally {
            $this->isLoading = false;
        }
    }

    public function generatePoster(AiStoryService $aiStoryService)
    {
        if (!$this->image || empty($this->aiResult['detected_motif'])) {
            $this->isGeneratingPoster = false;
            return;
        }

        try {
            $this->posterUrl = $aiStoryService->generatePoster(
                $this->image,
                $this->aiResult['detected_motif'],
                $this->aiResult['category'] ?? 'Budaya'
            );
        } catch (\Throwable $e) {
            report($e);
            // Silent fail for poster, user still gets story
        } finally {
            $this->isGeneratingPoster = false;
        }
    }

    /**
     * Tahap 2: Publish cerita (simpan ke DB + generate QR)
     */
    public function publish(StoryService $storyService)
    {
        $this->reset('errorMessage');

        if (!$this->image || !$this->aiResult) {
            $this->errorMessage = 'Silakan unggah dan proses gambar dengan AI terlebih dahulu.';
            return;
        }

        try {
            $this->isLoading = true;

            $this->story = $storyService->createStoryFromAiResult(
                $this->image,
                $this->aiResult,
                $this->posterUrl
            );

            // reset file & draft, tapi bahasa tetap
            $this->reset(['image', 'aiResult', 'posterUrl']);
        } catch (\Throwable $e) {
            report($e);
            $this->errorMessage = 'Gagal menyimpan cerita. Silakan coba lagi.';
        } finally {
            $this->isLoading = false;
        }
    }
}

