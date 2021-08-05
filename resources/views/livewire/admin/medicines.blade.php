<div>
        <x-header>
            <x-slot name="title">{{ __('global.models.medicines') }}</x-slot>
            <x-slot name="add">
                <div>
                    @if(count(array_intersect(session()->get('grant'), ['su','medicines_access']))==1)
                        <a href="#" class="hover:text-indigo-500" title="{{ __('global.create') }}" wire:click='showCreateForm'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </a>
                    @endif
                </div>
            </x-slot>
            <x-pagesize/>
            <x-search-term/>
        </x-header>
        <x-table.table :headers="$headers">
            @forelse ($items as $item)
                <tr class=" border-b-2 border-gray-100 hover:bg-gray-100">
                    <x-table.td>{{ $item->schedule }}</x-table.td>
                    <x-table.td>{{ $item->generic_name }} <span class="text-gray-400 text-xs">({{ $item->product_name }})</span></x-table.td>
                    <x-table.td>{{ $item->dosage_form }} ({{ $item->pack_size }})</x-table.td>
                    <x-table.td align="right">{{ number_format(($item->cost_price+$item->cost_per_unit+$item->dispensing_fee+$item->add_on_fee)/100,2) }}</x-table.td>
                    <x-table.td align="right">
                        <div class="flex justify-end">
                            <x-btn-edit id="{{ $item->id }}"/>
                            <x-btn-delete id="{{ $item->id }}"/>
                            <x-btn-show id="{{ $item->id }}"/>
                        </div>
                    </x-table.td>
                </tr>
            @empty
                <tr><td colspan="5" class="py-2 px-4">{{ __('No Records Found') }}</td></tr>
            @endforelse
        </x-table.table>
        {{ $items->links() }}
    
    @if(count(array_intersect(session()->get('grant'), ['su','medicines_access']))==1)
    <x-confirmation-modal maxWidth="md" wire:model="confirmingItemDeletion">
        <x-slot name="title">{{ __('global.delete') }}</x-slot>
        <x-slot name="content">{{ __('global.confirm_delete') }}</x-slot>
        <x-slot name="footer">
            <x-btn-secondary wire:click="$set('confirmingItemDeletion', false)" wire:loading.attr="disabled">
                {{ __('global.cancel') }}
            </x-btn-secondary>
            <x-btn-danger class="ml-2" mode="delete" wire:click="deleteItem()" wire:loading.attr="disabled">
                {{ __('global.delete') }}
            </x-btn-danger>
        </x-slot>
    </x-confirmation-modal>

    <x-modal-edit maxWidth="3xl" wire:model="confirmingItemEdition">
        <x-slot name="title">
            {{ __('global.edit') }}
        </x-slot>
        <x-slot name="content">
            @include('admin.medicine_form')
        </x-slot>
        <x-slot name="footer">
            <x-btn-secondary wire:click="$set('confirmingItemEdition', false)">{{ __('global.cancel') }}</x-btn-secondary>
            <x-button mode="add" wire:click="editItem()">{{ __('global.save') }}</x-button>
        </x-slot>
    </x-modal-edit>

    <x-modal-add maxWidth="3xl" wire:model="confirmingItemCreation">
        <x-slot name="title">
            {{ __('global.add_new_record') }}
        </x-slot>
        <x-slot name="content">
            @include('admin.medicine_form')
        </x-slot>
        <x-slot name="footer">
            <x-btn-secondary wire:click="$set('confirmingItemCreation', false)">{{ __('global.cancel') }}</x-btn-secondary>
            <x-button mode="add" wire:click="createItem()">{{ __('global.save') }}</x-button>
        </x-slot>
    </x-modal-add>
    @else
<x-modal-general maxWidth="3xl" wire:model="confirmingItemView">
    <x-slot name="title">
        View
    </x-slot>
    <x-slot name="content">
        @include('admin.medicine_show')
    </x-slot>
    <x-slot name="footer">
        <x-btn-secondary wire:click="$set('confirmingItemView', false)">Close</x-btn-secondary>
    </x-slot>
</x-modal-general>
    @endif
</div>
