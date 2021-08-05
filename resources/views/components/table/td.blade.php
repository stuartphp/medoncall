@props(['align'=>'left'])

@php
    $textAlignClass = (new App\Helpers\TextAlignment($align))->className();
@endphp

<td class="p-2 text-sm {{ $textAlignClass }}">
    {{ $slot }}
</td>
