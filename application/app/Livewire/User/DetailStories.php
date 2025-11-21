<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;


#[Title('Detail Stories')]
#[Layout('layouts.app')]

class DetailStories extends Component
{
    public function render()
    {
        return view('livewire.user.detail-stories');
    }
}
