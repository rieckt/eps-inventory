<form action="{{ route($route . '.store') }}" method="POST">
    @csrf

    <x-form-fields :model="$model" :fields="$fields" :dropdowns="$dropdowns ?? []" :order="$order" />

    <div class="flex items-center justify-end mt-4">
        <x-primary-button>
            {{ __('Create') }}
        </x-primary-button>

        <a href="{{ route($route . '.index') }}" class="ml-4">
            <x-secondary-button>
                {{ __('Back') }}
            </x-secondary-button>
        </a>
    </div>
</form>
