<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SchoolClassRequest extends FormRequest
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
            // 'name' => ['required', 'string', 'unique:school_classes,name'],
            'name' => ['required', 'string', Rule::unique('school_classes')->ignore($this->route('school_class'))],
            'subjects' => $this->isMethod('post') ? ['required', 'array'] : ['nullable', 'array'],
            'status' => ['required', 'boolean']
        ];
    }
}
