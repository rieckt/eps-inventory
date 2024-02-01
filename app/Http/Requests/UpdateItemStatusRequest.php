<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemStatusRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'inventory_id' => ['required', 'integer', 'exists:inventory,id'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'],
            'description' => ['required', 'string'],
            'room_id' => ['required', 'integer', 'exists:rooms,id'],
            'lehrer_id' => ['required', 'integer', 'exists:lehrers,id'],
            'status_id' => ['required', 'integer', 'exists:statuses,id'],
        ];
    }
}
