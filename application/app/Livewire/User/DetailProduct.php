<?php

namespace App\Livewire\User;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.link')]
class DetailProduct extends Component
{
    public $product;
    public $username;
    public $slug;

    public function mount($username, $slug)
    {
        $this->username = $username;
        $this->slug = $slug;
        
        // Cari produk berdasarkan slug dan pastikan milik user dengan username tersebut
        $this->product = Product::whereHas('user', function($query) {
            $query->where('username', $this->username);
        })
        ->where('slug', $this->slug)
        ->where('is_published', true)
        ->firstOrFail();
    }

    public function getWhatsappLink()
    {
        $phone = $this->product->user->phone;
        // Bersihkan nomor telepon dari karakter non-numerik
        $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
        
        // Tambahkan 62 jika diawali dengan 0
        if (substr($cleanPhone, 0, 1) === '0') {
            $cleanPhone = '62' . substr($cleanPhone, 1);
        }
        
        $productUrl = url('/' . $this->username . '/product/' . $this->slug);
        $message = "Halo, saya tertarik dengan produk:\n\n";
        $message .= "*" . $this->product->name . "*\n";
        $message .= "Harga: Rp " . number_format($this->product->price, 0, ',', '.') . "\n\n";
        $message .= "Link produk: " . $productUrl . "\n\n";
        $message .= "Apakah produk ini masih tersedia?";
        
        return "https://wa.me/{$cleanPhone}?text=" . urlencode($message);
    }

    public function render()
    {
        return view('livewire.user.detail-product')
            ->layout('layouts.link', ['title' => $this->product->user->name . ' - ' . $this->product->name]);
    }
}
