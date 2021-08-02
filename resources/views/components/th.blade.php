@props(['value'])
<th {{ $attributes->merge(['class' => 'px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200']) }}>
    {{ $value ?? $slot }}
</th>
