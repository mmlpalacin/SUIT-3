<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
        </div>

        <!-- lastname -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="lastname" value="{{ __('lastname') }}" />
            <x-input id="lastname" type="text" class="mt-1 block w-full" wire:model="state.lastname" required autocomplete="lastname" for="lastname"/>
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autocomplete="email" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}
                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>
                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        <div class="col-span-6 sm:col-span-4 flex items-center">
            <div x-data="{ photoName: null, photoPreview: null }" class="flex items-center">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden mt-2" wire:model="photo" x-ref="photo"
                       x-on:change="
                           photoName = $refs.photo.files[0].name;
                           const reader = new FileReader();
                           reader.onload = (e) => {
                               photoPreview = e.target.result;
                           };
                           reader.readAsDataURL($refs.photo.files[0]);
                       " />

                <!-- Current Profile Photo -->
                @if ($this->user->profile_photo_path)
                    <div class="mt-2">
                        <img src="{{ asset($this->user->profile_photo_path) }}" class="rounded-full h-20 w-20 object-cover">
                    </div>
                @endif

                <!-- New Profile Photo Preview -->
                <div class="mt-2 ml-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <!-- Select New Photo Button -->
                <x-button class="mt-2 ml-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-button>

                <!-- Remove Current Photo Button (if photo exists) -->
                @if ($this->user->profile_photo_path)
                    <x-button type="button" class="mt-2 ml-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-button>
                @endif
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>
        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>

