<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors
        <x-auth-validation-errors class="mb-4" :errors="$errors" />-->

        <form method="POST" action="{{ route('register') }}">
            <input type="hidden" name="team_id" value="<?php if(isset($_REQUEST['hash'])){echo $_REQUEST['hash'];}?>"/>
            @csrf
            <!-- Name -->
           @error('team_id')
            <p class="text-sm text-red-600">You are not allowed on this site!</p>
            <script>setTimeout(function(){
                window.location.href = '{{ url('/') }}';
             }, 1500);</script>
           @enderror
            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-input-error for="email" class="mt-2"/>
            </div>
            <div class="mt-4">
                <x-label for="mobile_number" :value="__('Mobile Number')" />
                <x-input id="mobile_number" class="block mt-1 w-full" type="text" name="mobile_number" :value="old('mobile_number')" required placeholder="0821234567"/>
                <x-input-error for="mobile_number" class="mt-2"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error for="password" class="mt-2"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
