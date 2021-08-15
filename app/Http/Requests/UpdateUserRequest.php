<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        $user = $this->user();

        return [
            'name' => 'required|string|min:3|max:255',
            'email' => "required|string|email|max:255|unique:users,email,$user->email,email",
            'password' => 'nullable|string|confirmed|min:8',
        ];
    }

    public function authorize(): bool
    {
        $logInUserId = $this->user()->id;
        $requestedUserId = $this->segment(3);

        if ($logInUserId == $requestedUserId)
            return true;

        return false;
    }
}