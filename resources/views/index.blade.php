<x-guest-layout>
    <div class="py-8 text-center text-gray-900 dark:text-gray-100">
        <h2 class="mb-4 text-2xl font-bold">{{ __('Welcome to Our Application') }}</h2>
        <p class="mb-8">{{ __('Please sign up or log in to continue.') }}</p>

        <div class="flex flex-row justify-center mb-8 space-x-8">
            <a href="{{ route('register') }}" aria-label="Register">
                <x-secondary-button class="uppercase transition duration-500 ease-in-out bg-blue-500 hover:bg-blue-600 dark:bg-gray-900 dark:hover:bg-gray-800">
                    <i class="mr-2 fas fa-user-plus"></i> {{ __('Sign Up') }}
                </x-secondary-button>
            </a>

            <a href="{{ route('login') }}" aria-label="Login">
                <x-secondary-button class="uppercase transition duration-500 ease-in-out bg-blue-500 hover:bg-blue-600 dark:bg-gray-900 dark:hover:bg-gray-800">
                    <i class="mr-2 fas fa-sign-in-alt"></i> {{ __('Log In') }}
                </x-secondary-button>
            </a>
        </div>
    </div>
</x-guest-layout>
