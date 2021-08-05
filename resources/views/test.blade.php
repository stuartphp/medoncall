<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lgLpx-8">
        <x-header>
            <x-slot name="title">{{ __('global.models.medicines') }}</x-slot>

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
    </div>
</x-guest-layout>
