<div>
    @if(session()->has('grant'))
    <header class="px-4 py-4 bg-white rounded-b-lg shadow">
        <div class="flex flex-col justify-between px-4 sm:flex-row">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('global.models.roles') }}
            </h2>
            <div><a href="{{ route('admin.user-management.roles.create') }}" title="{{ __('global.create') }}"
                class="hover:text-indigo-500"
                wire:click='showCreateForm'>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </a></div>
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
                {{-- <div class="relative">
                    <select
                        class="block h-full px-4 py-1 pr-8 leading-tight text-gray-700 bg-white border-t border-b border-r border-gray-200 rounded-r appearance-none sm:rounded-r-none sm:border-r-0 focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                        <option>All</option>
                        <option>Active</option>
                        <option>Inactive</option>
                    </select>
                </div> --}}
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
                                            {{ __('roles.name') }}
                                            <x-icon-sort sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                                        </div>
                                    </a>
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">{{ __('roles.permisssions') }}</th>
                                <th class="px-6 py-3 border-b border-gray-200 "></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($data as $item)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-6 py-4 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                                        {{ $item->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                                        <div class="grid lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-2  gap-1">
                                            @foreach ($item->permissions as $permission)
                                                <div class="bg-purple-100 text-purple-600 py-1 px-3 rounded-full text-xs mb-3">
                                                    {{ ucwords(str_replace('_', ' ', $permission->title)) }}</div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex justify-end">
                                            <div class="w-4 mr-2">
                                                <a href="{{ route('admin.user-management.roles.edit', [$item->id]) }}"
                                                    class="text-gray-700 hover:text-indigo-400">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="w-4 mr-2">
                                                <a href="#" class="text-gray-700 hover:text-red-500"
                                                    wire:click="showDeleteForm({{ $item->id }});">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </a>
                                            </div>
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
    <form action="{{ route('admin.user-management.roles.destroy', [$primaryKey]) }}" id="DelForm" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <x-confirmation-modal wire:model="confirmingItemDeletion">
            <x-slot name="title">{{ __('global.delete') }}</x-slot>
            <x-slot name="content">{{ __('global.confirm_delete') }}</x-slot>
            <x-slot name="footer">
                <x-btn-secondary wire:click="$set('confirmingItemDeletion', false)" wire:loading.attr="disabled">
                    {{ __('global.cancel') }}
                </x-btn-secondary>
                <x-btn-danger class="ml-2" type="submit">
                    {{ __('global.delete') }}
                </x-btn-danger>
            </x-slot>
        </x-confirmation-modal>
    </form>
    @else
        {{ __('global.permission') }}
    @endif
</div>
