<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:100',
            'phone' => 'required|min:8|max:18',
            'message' => 'nullable|min:3|max:255'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}