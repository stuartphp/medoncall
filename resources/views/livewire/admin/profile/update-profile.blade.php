<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>
    <x-slot name="description">
        {{ __('Update your account\'s profile information.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('users.name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('users.email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-input-error for="email" class="mt-2" />
        </div>
        <!-- Mobile -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="mobile" value="{{ __('users.mobile_number') }}" />
            <x-input id="mobile" type="text" class="mt-1 block w-full" wire:model.defer="state.mobile_number" />
            <x-input-error for="mobile_number" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
