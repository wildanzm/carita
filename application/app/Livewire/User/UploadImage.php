<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;


#[Title('Upload Image')]
#[Layout('layouts.app')]

class UploadImage extends Component
{
    public function render()
    {
        return view('livewire.user.upload-image');
    }
}
