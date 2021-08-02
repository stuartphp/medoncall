<x-app-layout>
    <header class="px-4 py-4 bg-white rounded-b-lg shadow">
        <div class="flex flex-col justify-between px-4 sm:flex-row">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                <a href="{{ route('admin.user-management.roles.index') }}">{{ __('Roles') }}</a>
            </h2>
        </div>
    </header>
    <div class="overflow-x-auto">
        <div class="min-w-screen bg-gray-100 flex items-center justify-center font-sans overflow-hidden">
            <div class="mx-auto w-full">
                <div class="bg-white shadow-md rounded my-6 py-2 px-3">
                    <form action="{{ route('admin.user-management.roles.update', [$role->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mt-4">
                            <x-label>Title</x-label>
                            <x-input class="block mt-1 w-full" type="text" name="name" value="{{ $role->name }}" />
                        </div>
                        <div class="mt-4">
                            <x-label>Permissions</x-label>
                            <div class="mt-2 mb-2 grid lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-2 gap-2">
                                @foreach ($permissions as $id => $permission)
                                    @if($id != 1)
                                    <label for="{{ $id }}" class="flex items-center">
                                        <input type="checkbox" class= 'rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50' id="{{ $id }}" name="permissions[]" {{ in_array($id, old('permissions', [])) || (isset($role) && $role->permissions->contains($id)) ? 'checked' : ''}} value="{{ $id }}"/>
                                        <span class="ml-2 text-sm text-gray-600">{{ ucwords(str_replace('_', ' ',$permission)) }}</span>
                                    </label>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-3 text-right">
                            <x-button class="ml-4">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

