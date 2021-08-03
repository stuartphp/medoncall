<div class="w-full">
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <x-label for="generic_name" value="{{ __('medicines.generic_name') }}" />
            <p>{{ $state['generic_name'] }}</p>
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <x-label for="product_name" value="{{ __('medicines.product_name') }}" />
            <p>{{ $state['product_name'] }}</p>
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="schedule" value="{{ __('medicines.schedule') }}" />
            <p>{{ $state['schedule'] }}</p>
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="category" value="{{ __('medicines.category') }}" />
            <p>{{ $state['category'] }}</p>
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="dosage_form" value="{{ __('medicines.dosage_form') }}" />
            <p>{{ $state['dosage_form'] }}</p>
        </div>

    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <x-label for="description" value="{{ __('medicines.description') }}" />
            <p>{{ $state['description'] }}</p>
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="pack_size" value="{{ __('medicines.pack_size') }}" />
            <p>{{ $state['pack_size'] }}</p>
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="cost_per_unit" value="Selling Price" />
            <p>R{{ $selling_price }}</p>
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="is_active" value="{{ __('medicines.is_active') }}" />
            <p>{{ $state['is_active']  }}</p>
        </div>
    </div>
    <p class="border-t mt-1">Ingredients</p>
    <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="pack_size" value="{{ __('ingredients.name') }}" />
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="cost_per_unit" value="{{ __('ingredients.unit') }}" />
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="is_active" value="{{ __('ingredients.strength') }}" />
        </div>
        @forelse ($state['ingredients'] as $ingr )
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <p>{{ $ingr['name'] }}</p>
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <p>{{ $ingr['unit'] }}</p>
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <p>{{ $ingr['strength']  }}</p>
            </div>
        @empty
        Nothing listed
        @endforelse

    </div>
</div>

