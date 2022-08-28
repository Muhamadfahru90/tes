<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $task_task_unique = Rule::unique('name', 'email');
        if ($this->method() !== 'POST') {
            $task_task_unique->ignore($this->route()->parameter('id'));
        }
        return [
            'name' => ['required', $task_task_unique],
            'email' => ['required', $task_task_unique],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ];
    }
}
