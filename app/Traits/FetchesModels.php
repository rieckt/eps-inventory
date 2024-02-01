<?php

namespace App\Traits;

trait FetchesModels
{
    /**
     * Get models and map them to an array with 'value' and 'label' keys.
     *
     * @param  string  $modelClass
     * @param  array  $options
     * @return array
     *
     * @throws \InvalidArgumentException
     */
    public function getModels(string $modelClass, array $options = []): array
    {
        if (!class_exists($modelClass) || !is_subclass_of($modelClass, \Illuminate\Database\Eloquent\Model::class)) {
            throw new \InvalidArgumentException("The class {$modelClass} must be a valid Eloquent model class.");
        }

        $query = $modelClass::query();

        $labelField = $options['labelField'] ?? 'name';

        return $query->get()->map(function ($model) use ($labelField) {
            return ['value' => $model->id, 'label' => $model->$labelField];
        })->toArray();
    }
}
