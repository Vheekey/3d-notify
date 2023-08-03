<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class CreateNotification extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('admin-action');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'emails' => 'required|array|min:1',
            'emails.*' => 'required|string|exists:users,email',
            'title' => 'required|string|min:5',
            'scheduled' => 'required|int|min:0',
            'message' => 'required|string|min:5',
            'via' => 'nullable|string|in:sms,email',
        ];
    }
}
