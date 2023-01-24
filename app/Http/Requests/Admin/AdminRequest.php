<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the admin is authorized to make this request.
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
            'email' => [Rule::when($this->isMethod('patch'), 'nullable', 'required'), 'string', 'email', 'max:255', Rule::unique(Admin::class)->ignore($this->admin?->id)],
            'password' => [Rule::when($this->isMethod('patch'), 'nullable', 'required'), 'string', 'min:8', 'confirmed'],
        ];
    }
}

