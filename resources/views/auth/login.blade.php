<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            
               <img src="{{asset('img/logo.png')}}" class="w-48" alt="">
            
        </x-slot>

       

       
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Username')" />

                <x-input id="email" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Se connecté') }}
                </x-button>
            </div>
        </form>

        
    </x-auth-card>
</x-guest-layout>
