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
            'captionLanguage' => 'required|in:id,su,en',
            // wajib diisi kalau pilih custom
            'customLanguage'  => 'nullable|string|max:150|required_if:captionLanguage,custom',
        ];
    }

    public function render()
    {
        return view('livewire.user.upload-image');
    }

    public function updatedImage()
    {
        // Reset hasil lama, tapi TIDAK reset captionLanguage (biar pilihan user tetap)
        $this->reset(['aiResult', 'story', 'errorMessage']);
    }

    public function analyze(AiStoryService $aiStoryService)
    {
        // Validasi image + captionLanguage (+ custom kalau perlu)
        $this->validate();

        $this->reset(['errorMessage', 'aiResult', 'story']); // reset hasil lama
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
                return;
            }

            $this->aiResult = $aiResult;
            // dd($this->aiResult);
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

        if (!$this->image || !$this->aiResult) {
            $this->errorMessage = 'Silakan unggah dan proses gambar dengan AI terlebih dahulu.';
            return;
        }

        try {
            $this->isLoading = true;

            $this->story = $storyService->createStoryFromAiResult(
                $this->image,
                $this->aiResult
            );

            // reset file & draft, tapi bahasa tetap
            $this->reset(['image', 'aiResult']);
        } catch (\Throwable $e) {
            report($e);
            $this->errorMessage = 'Gagal menyimpan cerita. Silakan coba lagi.';
        } finally {
            $this->isLoading = false;
        }
    }
}
