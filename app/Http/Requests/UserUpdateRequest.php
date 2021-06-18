<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'responsible_id' => [
                'nullable', 'integer', 'exists:users,id', 'required_if:level_access,'.User::$ROLE_COLLABORATOR
            ],
            'name' => [
                'required', 'string'
            ],
            'email' => [
                'required', 'email', 'unique:users,email,'.$this->route('id')
            ],
            'level_access' => [
                'required', 'integer'
            ],
            'password' => [
                'required', 'string', 'min:8'
            ],
        ];
    }
}
