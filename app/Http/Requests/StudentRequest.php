<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'required_with:password|same:password|min:6',
            'admission_number' => ['required', 'string'],
            'roll_number' => ['required', 'string'],
            'school_class_id' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'date_of_birth' => ['required', 'string'],
            'religion' => ['required', 'string'],
            'mobile_number' => ['required', 'string'],
            'admission_date' => ['required', 'string'],
            'blood_group' => ['required', 'string'],
            'height' => ['required', 'string'],
            'weight' => ['required', 'string'],
            'status' => ['required', 'string'],
            'profile_pic' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }
}
