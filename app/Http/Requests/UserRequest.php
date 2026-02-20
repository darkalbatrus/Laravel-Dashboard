<?php

namespace App\Http\Requests;

use App\Rules\PersianPhoneRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'family' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile' => [new PersianPhoneRule()],
            'password' => 'required|min:6|max:255',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'name.required' => 'نام نمیتواند خالی باشد',
    //     ];
    // }
}
