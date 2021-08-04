<div>
    <header class="px-4 py-4 bg-white rounded-b-lg shadow">
        <div class="flex flex-col justify-between px-4 sm:flex-row">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Manage Orders
            </h2>
            <div class="flex">
                <div class="relative">
                    <select
                        class="block h-full px-4 py-1 pr-8 leading-tight text-gray-700 bg-white border border-gray-200 rounded-l appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                        wire:model="pageSize"
                        >
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>
                </div>
                <div class="relative">
                    <select
                        class="block h-full px-4 py-1 pr-8 leading-tight text-gray-700 bg-white border-t border-b border-r border-gray-200 rounded-r appearance-none sm:rounded-r-none sm:border-r-0 focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                        <option value="">All</option>
                        @foreach (__('global.status') as $k=>$v )
                            <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="relative block sm:mt-0">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg viewBox="0 0 24 24" class="w-4 h-4 text-gray-500 fill-current">
                            <path
                                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                            </path>
                        </svg>
                    </span>
                    <input placeholder="{{ __('global.search') }}"
                        wire:model.debounce.300ms="searchTerm"
                        class="block w-full py-1 pl-8 pr-6 text-sm text-gray-700 placeholder-gray-400 bg-white border border-b border-gray-200 rounded-l rounded-r appearance-none sm:rounded-l-none focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                </div>
            </div>
        </div>
    </header>
    <div class="mx-auto max-w-7xl">
        <div class="flex flex-col mt-4">
            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full">
                        <thead class="bg-white">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">
                                    <a href="#" wire:click="sortBy('name')">
                                        <div class="flex items-center text-indigo-400">
                                            {{ __('orders.order_number') }}
                                            <x-icon-sort sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                                        </div>
                                    </a>
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">
                                    <a href="#" wire:click="sortBy('email')">
                                        <div class="flex items-center text-indigo-400">
                                            {{ __('orders.total_due') }}
                                            <x-icon-sort sortField="email" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                                        </div>
                                    </a>
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200">Status</th>

                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($data as $item)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-6 py-4 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                                        {{ $item->order_number }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                                        {{ number_format($item->total_due/100,2) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-no-wrap border-b border-gray-200 flex ">
                                        <div class="items-end">
                                            <select class="block px-4 py-1 pr-8 leading-tight text-gray-700 bg-white border-t border-b border-r border-gray-200 rounded-r appearance-none sm:rounded-r-none sm:border-r-0 focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500"
                                        wire:change="updateOrder({{ $item->id }}, $event.target.value)">
                                        @foreach (__('global.status') as $k=>$v )
                                            <option value="{{ $k }}" {{ ($item->status==$k) ? 'selected':'' }}>{{ $v }}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5">{{ __('No Records Found') }}</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
