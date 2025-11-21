<?php

namespace App\Livewire\Settings;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.sidebar')]
class Appearance extends Component
{
    /**
     * Render the component.
     */
    public function render()
    {
        return view('livewire.settings.appearance');
    }
}
