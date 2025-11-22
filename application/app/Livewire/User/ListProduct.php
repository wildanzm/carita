<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.link')]
class ListProduct extends Component
{
    public $user;
    public $products;
    public $title;
    
    public function mount($username)
    {
        // Cari user berdasarkan username
        $this->user = User::where('username', $username)->firstOrFail();
        
        // Set title berdasarkan nama lengkap user
        $this->title = $this->user->name;
        
        // Ambil produk yang sudah dipublish dari user tersebut
        $this->products = Product::where('user_id', $this->user->id)
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.user.list-product')->title($this->title);
    }
}
