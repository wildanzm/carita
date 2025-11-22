<?php

use App\Livewire\User\Home;
use Laravel\Fortify\Features;
use App\Livewire\User\Dashboard;
use App\Livewire\Settings\Profile;
use App\Livewire\User\UploadImage;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\TwoFactor;
use \App\Livewire\User\DetailStories;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get("/upload", UploadImage::class)
    ->middleware(['auth', 'verified'])
    ->name('upload-image');
Route::get("/detail", DetailStories::class)->name('detail-stories');

Route::get('dashboard', Dashboard::class)
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});