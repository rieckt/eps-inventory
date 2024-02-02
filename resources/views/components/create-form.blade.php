<form action="{{ route($route . '.store') }}" method="POST">
    @csrf

    <x-form-fields :model="$model" :fields="$fields" :dropdowns="$dropdowns ?? []" :order="$order" />

    <div class="flex items-center justify-end mt-4">
        <a href="{{ route($route . '.index') }}" class="inline-flex items-center mr-4">
            <x-secondary-button>
                {{ __('Back') }}
            </x-secondary-button>
        </a>

        <x-primary-button>
            {{ __('Create') }}
        </x-primary-button>
    </div>
</form>
