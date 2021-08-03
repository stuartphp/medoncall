<div class="flex flex-col mt-2">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="flex justify-end mb-2">
                <a href="#" wire:click="showCreate" >Create</a>
        </div>
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <a href="#">
                                <div class="flex items-center text-indigo-400">
                                    {{ __('orders.order_number') }}
                                </div>
                            </a>
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('orders.total_items') }}</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('orders.total_due') }}</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('orders.status') }}</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @forelse ($data as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            {{ $item->order_number }}
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            {{ $item->total_items }}
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            {{ number_format($item->total_due) }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            {{ __('global.status.'.$item->status) }}
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200">
                            @if ($item->status==1)
                                <a href="/admin/orders/{{ $item->id }}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <a href="#" wire:click="confirmOrder({{ $item->id }})" class="text-indigo-600 hover:text-indigo-900">Confirm</a>
                                @elseif ($item->status < 3)
                                <a href="/admin/orders/{{ $item->id }}" class="text-indigo-600 hover:text-indigo-900" target="_blank">View</a>
                            @endif

                        </td>
                    </tr>
                    @empty
                        <tr><td colspan="6" class="py-2 px-4">{{ __('global.no_results') }}</td></tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        {{ $data->links() }}
    </div>
    <x-modal-general maxWidth="lg" wire:model="confirmCreate">
        <x-slot name="title">
            {{ __('Delivery Address') }}
        </x-slot>
        <x-slot name="content">
            <p class="text-gray-400">Please select an address.</p>
            <x-select class="w-full" wire:model.defer="item">
                <option value="">Please Select</option>
                @forelse ($addresses as $adr)
                    <option value="{{ $adr['id'] }}">{{ $adr['delivery_address'] }}</option>
                @empty
                    <option value="">No Approved address</option>
                @endforelse
            </x-select>
        </x-slot>
        <x-slot name="footer">
            <x-btn-secondary wire:click="$set('confirmCreate', false)">{{ __('global.cancel') }}</x-btn-secondary>
            @if(count($addresses)>0)
            <x-button mode="add" wire:click="createItem">{{ __('global.create') }}</x-button>
            @endif
        </x-slot>
    </x-modal-general>
</div>
