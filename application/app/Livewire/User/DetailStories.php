<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;


use App\Models\GeneratedStory;

#[Title('Detail Stories')]
#[Layout('layouts.story')]

class DetailStories extends Component
{
    public $story;

    public function mount($public_id = null)
    {
        if ($public_id) {
            $this->story = GeneratedStory::where('public_id', $public_id)->firstOrFail();
        }
    }

    public function render()
    {
        return view('livewire.user.detail-stories');
    }
}
