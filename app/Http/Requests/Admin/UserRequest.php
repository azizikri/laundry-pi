<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => [Rule::when($this->isMethod('patch'), 'nullable', 'required'), 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user?->id)],
            'password' => [Rule::when($this->isMethod('patch'), 'nullable', 'required'), 'string', 'min:8', 'confirmed'],
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->isMethod('patch')) {
            $data = ['name', 'email'];

            foreach ($data as $key) {
                if ($this->input($key) === null) {
                    $this->request->remove($key);
                }
            }

        }
    }
}
