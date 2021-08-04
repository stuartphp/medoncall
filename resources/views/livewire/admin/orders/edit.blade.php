<div>
    <header class="px-4 py-4 bg-white rounded-b-lg shadow">
        <div class="flex flex-col justify-between px-4 sm:flex-row">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Order Edit
            </h2>
            <div>Status: <span class="text-gray-500">{{ __('global.status.'.$status) }}</span></div>
            <div><b>Due: </b>R {{ number_format($total_due,2) }}</div>
        </div>
    </header>
    <div class="flex">
        <x-input type="text" class="w-2/4 sm:w-full mt-1 block" wire:model.debounce.300ms="searchTerm"/>
        <x-select wire:model="selected" class="w-2/4 sm:w-full" required>
            <option value="">Select</option>
            @forelse ($items as $i)
                <option value="{{ $i->id }}">{{ $i->generic_name.' ('.$i->product_name.') R'.number_format(($i->cost_price+$i->cost_per_unit+$i->dispencing_fee+$i->add_on_fee)/100,2) }}</option>
            @empty
                <option value="">No Items Found</option>
            @endforelse
        </x-select>
    </div>
    <div class="mt-2 align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Description
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Unit</th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Quantity</th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Amount</th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                </tr>
            </thead>

            <tbody class="bg-white">
                @forelse ($order_items as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $item->medicine->generic_name}}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $item->medicine->dosage_form}}({{ $item->medicine->pack_size }})
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="flex items-center">
                            {{ $item->quantity }}
                            <div class="ml-2">
                                <a href="#" class="hover:text-blue-600" wire:click="increment({{ $item->id }})" >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                    </svg>
                                </a>
                                <a href="#" class="hover:text-red-600" wire:click="decrement({{ $item->id }})">
                                   <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                   </svg>
                                </a>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ number_format($item->retail/100,2) }}
                    </td>
                    <td class="px-2 py-4 whitespace-no-wrap text-right border-b border-gray-200">
                        <div class="text-right">
                            <a href="#" class="text-indigo-600 hover:text-red-700" title="Delete" wire:click="remove({{ $item->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </a>
                        </div>
                    </td>
                </tr>
                @empty
                    <tr><td colspan="5" class="py-2 px-4">{{ __('global.no_results') }}</td></tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right px-4 py-2">
                        @if (auth()->user()->team->earnings > 0)
                        <label for="credit" class="inline-flex items-center">
                            <input id="credit" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model="applyCredit">
                            <span class="ml-2 text-sm text-gray-600">Use your credit of ({{ number_format(auth()->user()->team->earnings/100,2) }})</span>
                        </label>
                        @endif
                    </td>
                    <td class="text-right px-4 py-2">
                        <x-button mode="add" wire:click="updateOrder()">Update</x-button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
