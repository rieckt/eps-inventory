<x-guest-layout>

    <div class="flex flex-row justify-center space-x-8">
        <a href="{{ route('register') }}">
            <x-secondary-button>
                {{ __('Sign Up') }}
            </x-secondary-button>
        </a>

        <a href="{{ route('login') }}">
            <x-secondary-button>
                {{ __('Log In') }}
            </x-secondary-button>
        </a>
    </div>
</x-guest-layout>
