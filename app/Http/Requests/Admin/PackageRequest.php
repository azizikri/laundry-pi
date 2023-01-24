<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [Rule::when($this->isMethod('patch'), 'nullable', 'required'), 'string', 'max:255'],
            'price' => [Rule::when($this->isMethod('patch'), 'nullable', 'required'), 'numeric'],
            'description' => [Rule::when($this->isMethod('patch'), 'nullable', 'required'), 'string', 'max:255'],
            'kg' => [Rule::when($this->isMethod('patch'), 'nullable', 'required'), 'numeric'],
        ];
    }
}
