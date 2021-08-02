<x-label>{{ __('users.name') }}</x-label>
<x-input class="block mt-1 w-full" type="text" wire:model.defer="item.name"/>
<x-label>{{ __('users.email') }}</x-label>
<x-input class="block mt-1 w-full" type="text" wire:model.defer="item.email"/>
<x-label>{{ __('users.mobile_number') }}</x-label>
<x-input class="block mt-1 w-full" type="text" wire:model.defer="item.mobile_number"/>
