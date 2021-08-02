<div>
    <div class="mx-auto max-w-7xl">
        <div class="flex flex-col mt-1">
            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full">
                        <thead class="bg-white">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">{{ __('users_address.delivery_address') }}</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">{{ __('users_address.is_approved') }}</th>
                                <th class="px-6 py-3 border-b border-gray-200">
                                    <a href="#" class="hover:text-indigo-500" title="{{ __('global.create') }}"
                                        wire:click='showCreateForm'>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($data as $item)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-6 py-4 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                                        {{ $item->delivery_address }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                                        {{ ($item->is_approved==1) ? 'Yes' : 'No' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex justify-end">
                                            <x-btn-edit id="{{ $item->id }}"/>
                                            <x-btn-delete id="{{ $item->id }}"/>
                                        </div>

                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="2" class="py-2 px-4">{{ __('No Records Found') }}</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $data->links() }}
            </div>
        </div>
    </div>
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

    <x-modal-edit maxWidth="2xl" wire:model="confirmingItemEdition">
        <x-slot name="title">
            {{ __('global.edit') }}
        </x-slot>
        <x-slot name="content">
            <x-label>{{ __('users_address.delivery_address') }}</x-label>
            <x-textarea wire:model.defer="state.delivery_address" class="w-full h-36"></x-textarea>
        </x-slot>
        <x-slot name="footer">
            <x-btn-secondary wire:click="$set('confirmingItemEdition', false)">{{ __('global.cancel') }}</x-btn-secondary>
            <x-button mode="add" wire:click="editItem()">{{ __('global.save') }}</x-button>
        </x-slot>
    </x-modal-edit>

    <x-modal-add maxWidth="2xl" wire:model="confirmingItemCreation">
        <x-slot name="title">
            {{ __('global.add_new_record') }}
        </x-slot>
        <x-slot name="content">
            <x-label>{{ __('users_address.delivery_address') }}</x-label>
            <x-textarea wire:model.defer="state.delivery_address" class="w-full h-36"></x-textarea>
        </x-slot>
        <x-slot name="footer">
            <x-btn-secondary wire:click="$set('confirmingItemCreation', false)">{{ __('global.cancel') }}</x-btn-secondary>
            <x-button mode="add" wire:click="createItem()">{{ __('global.save') }}</x-button>
        </x-slot>
    </x-modal-add>
</div>
