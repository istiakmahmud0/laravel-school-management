<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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

            'subjects.*.subject_name' => ['required', 'string'],
            'subjects.*.subject_type' => ['required', 'in:Practical,Theory'],
            'subjects.*.subject_status' => ['required', 'boolean'],
        ];
    }
}
