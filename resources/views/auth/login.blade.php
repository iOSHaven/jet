<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" >
                <x-logo class="w-20 h-20 fill-current text-gray-400 dark:text-gray-500" fill="true" />
            </a>
        </x-slot>

        <x-apple-login-button width="250" size="16" href="{{ route('login.apple') }}"/>

    </x-auth-card>

</x-guest-layout>



