<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Dashboard')]
#[Layout('layouts.sidebar')]
class Dashboard extends Component
{
    public int $totalProducts = 0;
    public array $clickStats = [];
    public array $viewStats = [];

    public function mount()
    {
        // Dummy data - nanti bisa diganti dengan data real dari database
        $this->totalProducts = 24;
        
        // Data untuk 7 hari terakhir
        $this->clickStats = [
            'labels' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            'data' => [45, 52, 38, 67, 71, 58, 63]
        ];
        
        $this->viewStats = [
            'labels' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            'data' => [120, 145, 128, 180, 195, 167, 175]
        ];
    }

    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
