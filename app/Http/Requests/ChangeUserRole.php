<?php

namespace App\Http\Requests;

use App\Enums\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;

class ChangeUserRole extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'newRole' => 'required|string|in:'.implode(",", $this->roles()),
            'email' => 'required|string|exists:users,email'
        ];
    }

    private function roles(): array
    {
        return array_column(RoleEnum::cases(), 'value');
    }
}
