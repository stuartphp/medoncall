<div class="flex flex-col">
    <header class="px-4 py-4 bg-white rounded-b-lg shadow">
        <div class="flex flex-col justify-between px-4 sm:flex-row">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Orders
            </h2>
            <div><a href="#" wire:click="showCreate" >Create</a></div>
        </div>
    </header>
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="flex justify-end mb-2">

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
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 w-28"></th>
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
                            {{ number_format($item->total_due/100,2) }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            {{ __('global.status.'.$item->status) }}
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 w-28">
                            @if ($item->status==1)
                            <div class="flex justify-between">
                                <a href="/orders/{{ $item->id }}/edit" class="text-indigo-600 hover:text-indigo-900" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                      </svg>
                                </a>
                                @if($item->total_due>0)
                                <a href="#" wire:click="confirmOrder({{ $item->id }})" class="text-indigo-600 hover:text-indigo-900" title="Confirm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                      </svg>
                                </a>
                                @endif
                            </div>

                                @elseif ($item->status < 3)
                                <a href="/orders/{{ $item->id }}" class="text-indigo-600 hover:text-indigo-900" target="_blank" title="View"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                  </svg></a>
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
