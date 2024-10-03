<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
            'countryCode' => 'required|string|max:2',
            'phone' => 'required|numeric|max_digits:10|unique:users,phone',
            'type' => 'required|string|in:user,individual_provider,company_provider',
            'website' => 'required_if:type,company_provider|url',
            'business_name' => 'required_if:type,company_provider,individual_provider|string|max:255',
        ];
    }
}
