@props(['active', 'dropdown'=>false])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition';
@endphp

@if($dropdown)
<div x-data="{ open: false }"
    @click.away="open = false"
    @close.stop="open = false"
    @click="open = ! open"
    {{ $attributes->merge(['class' => $classes]) }}
    >
    <div class="flex cursor-pointer">
        {{ $slot }}
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </div>
    <template x-if="open">
        <div class="children border border-gray-300 mt-3 rounded-md"
        x-show="open == true"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95">
            {{ $children }}
        </div>
    </template>
</div>
@else
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
@endif
