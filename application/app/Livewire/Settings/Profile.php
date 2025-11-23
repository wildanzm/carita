<?php

namespace App\Livewire\Settings;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

#[Title('Profil')]
#[Layout('layouts.sidebar')]
class Profile extends Component
{
    use WithFileUploads;

    public string $name = '';

    public string $email = '';

    public string $username = '';

    public string $phone = '';

    public $profile_photo_path;

    public bool $editMode = false;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->username = Auth::user()->username ?? '';
        $this->phone = Auth::user()->phone ?? '';
        $this->profile_photo_path = Auth::user()->profile_photo_path;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation()
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user->id),
            ],

            'username' => [
                'required',
                'string',
                'max:255',
                'alpha_dash',
                Rule::unique(User::class)->ignore($user->id),
            ],

            'phone' => ['nullable', 'string', 'max:20'],

            'profile_photo_path' => Rule::when($this->profile_photo_path instanceof UploadedFile, ['nullable', 'image', 'max:2048'], ['nullable']),
        ]);

        // Handle profile photo upload
        if ($this->profile_photo_path instanceof UploadedFile) {
            // Delete old photo if exists
            if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            // Store new photo
            $path = $this->profile_photo_path->store('profile-photos', 'public');
            $validated['profile_photo_path'] = $path;
        }

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
        
        return $this->redirect(route('profile.edit'), navigate: false);
    }

    /**
     * Enable edit mode.
     */
    public function enableEdit(): void
    {
        $this->editMode = true;
    }

    /**
     * Cancel edit and reset to original values.
     */
    public function cancelEdit(): void
    {
        $this->editMode = false;
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->username = Auth::user()->username ?? '';
        $this->phone = Auth::user()->phone ?? '';
        $this->profile_photo_path = Auth::user()->profile_photo_path;
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Render the component.
     */
    public function render()
    {
        return view('livewire.settings.profile');
    }
}
