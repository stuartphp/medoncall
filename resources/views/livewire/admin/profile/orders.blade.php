<div class="flex flex-col">
    <header class="px-4 py-4 bg-white rounded-b-lg shadow">
        <div class="flex flex-col justify-between px-4 sm:flex-row">
            <div class="flex">
<h2 class="text-xl font-semibold leading-tight text-gray-800 mr-6">
                Orders
            </h2>
            @if($earnings>0)
            <div class="inline-block relative py-1 text-md">
                <div class="absolute inset-0 text-green-200 flex">
                    <svg height="100%" viewBox="0 0 50 100">
                        <path
                            d="M49.9,0a17.1,17.1,0,0,0-12,5L5,37.9A17,17,0,0,0,5,62L37.9,94.9a17.1,17.1,0,0,0,12,5ZM25.4,59.4a9.5,9.5,0,1,1,9.5-9.5A9.5,9.5,0,0,1,25.4,59.4Z"
                            fill="currentColor" />
                    </svg>
                    <div class="flex-grow h-full -ml-px bg-green-200 rounded-md rounded-l-none"></div>
                </div>
                <span class="relative text-green-500 uppercase font-semibold pr-px">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>R{{ number_format(auth()->user()->team->earnings/100,2) }}<span>&nbsp;</span>
                </span>
            </div>
            @endif
        </div>

            <div><a href="#" wire:click="showCreate" >Create</a></div>
        </div>
    </header>
    <div class="-my-2 py-4 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">

        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full bg-white">
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

                <tbody>
                    @forelse ($data as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm font-medium border-b border-gray-200">
                            {{ $item->order_number }}
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap text-sm border-b border-gray-200">
                            {{ $item->total_items }}
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap text-sm border-b border-gray-200">
                            {{ number_format($item->total_due/100,2) }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap text-sm border-b border-gray-200">
                            {{ __('global.status.'.$item->status) }}
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 w-32">
                            @if ($item->status==1)
                            <div class="flex justify-between">
                                <a href="/orders/{{ $item->id }}/edit" class="text-indigo-600 hover:text-indigo-900" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                      </svg>
                                </a>
                                @if($item->total_due>0)
                                <a href="#" wire:click="confirmOrder({{ $item->id }})" class="text-indigo-600 hover:text-indigo-900" title="Confirm Order">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                      </svg>
                                </a>
                                @if (auth()->user()->team->earnings>0)
                                    <a href="#" wire:click="confirmOrder({{ $item->id }}, true)" class="text-indigo-600 hover:text-indigo-900" title="Confirm Order And Use Credit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </a>
                                @endif

                                @endif
                            </div>

                                @elseif ($item->status >1)
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
