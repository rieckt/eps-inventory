<form action="{{ route($route . '.update', $model->id) }}" method="POST">
    @csrf
    @method('PUT')

    <x-form-fields :model="$model" :fields="$fields" :dropdowns="$dropdowns ?? []" />

    <div class="flex items-center justify-end mt-4">
        <x-primary-button>
            {{ __('Update') }}
        </x-primary-button>

        <a href="{{ route($route . '.index') }}" class="ml-4">
            <x-secondary-button>
                {{ __('Back') }}
            </x-secondary-button>
        </a>
    </div>
</form>
