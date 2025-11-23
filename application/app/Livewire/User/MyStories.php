<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Title('Carita Saya')]
#[Layout('layouts.sidebar')]
class MyStories extends Component
{
    public $stories = [];

    public function mount()
    {
        $this->stories = \App\Models\GeneratedStory::where('user_id', Auth::id())
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.user.my-stories');
    }
}
