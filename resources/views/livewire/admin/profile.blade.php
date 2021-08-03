<div>
    <header class="px-4 py-4 bg-white rounded-b-lg shadow">
        <div class="flex flex-col justify-between px-4 sm:flex-row">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ auth()->user()->name }}'s {{ __('global.profile') }}
            </h2>
            <div>
                <x-btn-secondary wire:click="showInvitation">Invite a team member</x-btn-secondary>
            </div>
        </div>
    </header>
    <div class="mx-auto max-w-7xl">
        <div class="flex flex-col mt-4 bg-white rounded-lg">
        <!--actual component start-->
        <div x-data="setup()">
            <ul class="flex justify-center items-center my-4">
                <template x-for="(tab, index) in tabs" :key="index">
                    <li class="cursor-pointer py-2 px-4 text-gray-500 border-b-8"
                        :class="activeTab===index ? 'text-indigo-500 border-indigo-500' : ''" @click="activeTab = index"
                        x-text="tab"></li>
                </template>
            </ul>

            <div class="px-6 py-4 mx-auto max-w-7xl">
                <div x-show="activeTab===0">
                    @livewire('admin.profile.update-profile')
                </div>
                <div x-show="activeTab===1">
                    @livewire('admin.profile.address')
                </div>
                <div x-show="activeTab===2">
                    @livewire('admin.profile.update-password')
                </div>
                <div x-show="activeTab===3">
                    @livewire('admin.profile.orders')
                </div>
                <div x-show="activeTab===4">
                    <div class="grid lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-2  gap-1">
                        @forelse ($data as $item)
                            <div class="bg-purple-100 text-purple-600 py-1 px-3 rounded-full text-xs mb-3">{{ $item->name }}</div>
                        @empty
                            No Members
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <!--actual component end-->
    </div></div>
    <x-modal-general maxWidth="lg" wire:model="sendInvitation">
        <x-slot name="title">
            {{ __('Send Invitation') }}
        </x-slot>
        <x-slot name="content">
            <p class="text-gray-400">Please inform this person of all the rules of this site.</p>
            <x-label>{{ __('Person Name') }}</x-label>
            <x-input type="text" name="person_name" class="w-full" required/>
            <x-label>{{ __('Email') }}</x-label>
            <x-input type="email" name="email" class="w-full" required/>
        </x-slot>
        <x-slot name="footer">
            <x-btn-secondary wire:click="$set('sendInvitation', false)">{{ __('global.cancel') }}</x-btn-secondary>
            <x-button mode="add" wire:click="createItem()">{{ __('global.send') }}</x-button>
        </x-slot>
    </x-modal-general>
    
    @push('scripts')
    <script>
        function setup() {
        return {
          activeTab: 0,
          tabs: [
              "Profile",
              "Address",
              "Password",
              "Orders",
              "Team",
          ]
        };
      };
    </script>
    @endpush
</div>
