<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm as JetstreamUpdateProfileInformationForm;
use Illuminate\Support\Facades\Storage;

class CustomUpdateProfileInformationForm extends JetstreamUpdateProfileInformationForm
{
    public function mount()
    {
        $user = Auth::user();
        $this->state = [
            'name' => $user->name,
            'lastname' => $user->lastname,
            'email' => $user->email,
            'profile_photo_path' => $user->profile_photo_path,
        ];
    }

    public function updateProfileInformation(UpdatesUserProfileInformation $updater)
    {
        if ($this->photo) {
            if (Auth::user()->profile_photo_path) {
                Storage::delete(str_replace('/storage', 'public', Auth::user()->profile_photo_path));
            }
            $photoPath = $this->photo->store('public/users');
            $photoUrl = Storage::url($photoPath);

            // Actualizar la URL de la foto de perfil del usuario
            Auth::user()->profile_photo_path = $photoUrl;
        }

        $updater->update(Auth::user(), $this->state);

        if (isset($this->photo)) {
            return redirect()->route('profile.show')->with('saved', 'refresh-navigation-menu');
        }

        $this->photo = null;

        $this->dispatch('saved');

        $this->dispatch('refresh-navigation-menu');
    }

    public function deleteProfilePhoto()
    {
        if (Auth::user()->profile_photo_path) {
            Storage::delete(str_replace('/storage', 'public', Auth::user()->profile_photo_path));
            Auth::user()->profile_photo_path = null;
        }
        $this->dispatch('refresh-navigation-menu');
    }

    public function render()
    {
        return view('profile.custom-update-profile-information-form');
    }
}
