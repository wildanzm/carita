<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\Product;

#[Title('Dashboard')]
#[Layout('layouts.sidebar')]
class Dashboard extends Component
{
    public int $totalProducts = 0;
    public array $clickStats = [];
    public array $viewStats = [];

    public function mount()
    {
        $this->totalProducts = Product::count();
        
        $this->clickStats = [
            'labels' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            'data' => [45, 52, 38, 67, 71, 58, 63]
        ];
        
        $this->viewStats = [
            'labels' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            'data' => [49, 79, 81, 50, 67, 45, 100]
        ];
    }

    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
