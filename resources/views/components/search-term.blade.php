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
