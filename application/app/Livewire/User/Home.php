<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;


#[Title('Home')]
#[Layout('layouts.app')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.user.home');
    }
}
