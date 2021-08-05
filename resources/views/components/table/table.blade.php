<table class="w-full bg-white mt-2 shadow overflow-hidden sm:rounded-lg">
    <thead>
        <tr class="border border-gray-200 bg-gray-50 ">
            @foreach ($headers as $header)
                <th class="px-2 py-3 text-xs leading-4 font-medium text-gyat-500 uppercase {{ $header['classes'] }}">
                    @if($header['sortable'])
                        <a href="#" wire:click="sortBy('{{ $header['sortable'] }}')">
                            <div class="flex items-center text-indigo-400">
                                {{ $header['name'] }}
                            </div>
                        </a>
                    @else
                    {{ $header['name'] }}
                    @endif
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>
