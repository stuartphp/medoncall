<div class="w-full">
    <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="nappi_code" value="{{ __('medicines.nappi_code') }}" />
            <x-input id="nappi_code" type="text" class="mt-1 block w-full" wire:model.defer="state.nappi_code" />
            <x-input-error for="nappi_code" class="mt-2" />
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="regno" value="{{ __('medicines.regno') }}" />
            <x-input id="regno" type="text" class="mt-1 block w-full" wire:model.defer="state.regno" />
            <x-input-error for="regno" class="mt-2" />
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="schedule" value="{{ __('medicines.schedule') }}" />
            <x-input id="schedule" type="text" class="mt-1 block w-full" wire:model.defer="state.schedule" />
            <x-input-error for="schedule" class="mt-2" />
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <x-label for="generic_name" value="{{ __('medicines.generic_name') }}" />
            <x-input id="generic_name" type="text" class="mt-1 block w-full" wire:model.defer="state.generic_name" />
            <x-input-error for="generic_name" class="mt-2" />
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <x-label for="product_name" value="{{ __('medicines.product_name') }}" />
            <x-input id="product_name" type="text" class="mt-1 block w-full" wire:model.defer="state.product_name" />
            <x-input-error for="product_name" class="mt-2" />
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="category" value="{{ __('medicines.category') }}" />
            <x-select id="category" class="mt-1 block w-full" wire:model.defer="state.category" >
                <option value="">All</option>
                <option value="General">General</option>
                <option value="Herbal">Herbal</option>
                <option value="Pharmaceutical">Pharmaceutical</option>
                <option value="Steroids">Steroids</option>
            </x-select>
            <x-input-error for="category" class="mt-2" />
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="dosage_form" value="{{ __('medicines.dosage_form') }}" />
            <x-input id="dosage_form" type="text" class="mt-1 block w-full" wire:model.defer="state.dosage_form" />
            <x-input-error for="dosage_form" class="mt-2"/>
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="pack_size" value="{{ __('medicines.pack_size') }}" />
            <x-input id="pack_size" type="text" class="mt-1 block w-full" wire:model.defer="state.pack_size" />
            <x-input-error for="pack_size" class="mt-2" /></div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <x-label for="description" value="{{ __('medicines.description') }}" />
            <x-textarea wire:model.defer="state.description" class="w-full h-36"></x-textarea>
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="num_packs" value="{{ __('medicines.num_packs') }}" />
            <x-input id="num_packs" type="text" class="mt-1 block w-full" wire:model.defer="state.num_packs" />
            <x-input-error for="num_packs" class="mt-2" />
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="cost_per_unit" value="{{ __('medicines.cost_per_unit') }}" />
            <x-input id="cost_per_unit" type="text" class="mt-1 block w-full" wire:model.defer="state.cost_per_unit" />
            <x-input-error for="cost_per_unit" class="mt-2" />
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="cost_price" value="{{ __('medicines.cost_price') }}" />
            <x-input id="cost_price" type="text" class="mt-1 block w-full" wire:model.defer="state.cost_price" />
            <x-input-error for="cost_price" class="mt-2" />
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="dispensing_fee" value="{{ __('medicines.dispensing_fee') }}" />
            <x-input id="dispensing_fee" type="text" class="mt-1 block w-full" wire:model.defer="state.dispensing_fee" />
            <x-input-error for="dispensing_fee" class="mt-2" />
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="add_on_fee" value="{{ __('medicines.add_on_fee') }}" />
            <x-input id="add_on_fee" type="text" class="mt-1 block w-full" wire:model.defer="state.add_on_fee" />
            <x-input-error for="add_on_fee" class="mt-2" />
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="is_active" value="{{ __('medicines.is_active') }}" />
            <x-checkbox id="is_active" wire:model.defer="state.is_active" />
        </div>
    </div>
</div>

