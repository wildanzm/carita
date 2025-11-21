<?php

namespace App\Livewire\Settings;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules\Password as PasswordRule;

#[Title('Password')]
#[Layout('layouts.sidebar')]
class Password extends Component
{
    public string $current_password = '';

    public string $password = '';

    public string $password_confirmation = '';

    public bool $editMode = false;

    /**
     * Enable edit mode.
     */
    public function enableEdit(): void
    {
        $this->editMode = true;
    }

    /**
     * Cancel edit mode.
     */
    public function cancelEdit(): void
    {
        $this->editMode = false;
        $this->reset('current_password', 'password', 'password_confirmation');
    }

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', PasswordRule::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => $validated['password'],
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
        $this->editMode = false;
    }

    /**
     * Render the component.
     */
    public function render()
    {
        return view('livewire.settings.password');
    }
}
