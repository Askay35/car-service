<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetAvailableCarsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'start_time' => ['required', 'date', 'after_or_equal:now'],
            'end_time' => ['required', 'date', 'after:start_time'],
            'car_model_id' => ['nullable', 'integer', 'exists:car_models,id'],
            'comfort_category_id' => ['nullable', 'integer', 'exists:comfort_categories,id'],
        ];
    }
}

