<header class="px-4 py-4 bg-white rounded-b-lg shadow">
    <div class="flex flex-col justify-between px-4 sm:flex-row">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $title }}
        </h2>
        {{ $add ?? '' }}
        <div class="flex">
            {{ $slot ?? '' }}
        </div>
    </div>
</header>
