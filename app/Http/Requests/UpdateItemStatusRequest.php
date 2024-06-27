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
            'item_id' => ['required', 'integer', 'exists:items,id'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'],
            'description' => ['required', 'string'],
            'room_id' => ['required', 'integer', 'exists:room,id'],
            'teacher_id' => ['required', 'integer', 'exists:users,id'],
            'status_id' => ['required', 'integer', 'exists:status,id'],
        ];
    }
}
