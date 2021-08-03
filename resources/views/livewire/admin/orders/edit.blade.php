<div>
    <header class="px-4 py-4 bg-white rounded-b-lg shadow">
        <div class="flex flex-col justify-between px-4 sm:flex-row">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Order Edit
            </h2>
            <div>
                <a href="#" class="hover:text-indigo-500" title="Edit Address" wire:click='showAddressForm'>
                Edit Address
                </a>
            </div>
            <div>Status: <span class="text-gray-500">{{ __('global.status.'.$status) }}</span></div>
            <div>R {{ $total_due }}</div>
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
                        {{ $item->quantity }}
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ number_format($item->retail/100,2) }}
                    </td>
                    <td
                        class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200">
                        <a href="/admin/orders/{{ $item->id }}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                </tr>
                @empty
                    <tr><td colspan="6" class="py-2 px-4">{{ __('global.no_results') }}</td></tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr><td colspan="4" class="text-right px-4 py-2"><x-button mode="add" wire:click="updateOrder()">Update</x-button></tr>
            </tfoot>
        </table>
    </div>
</div>
