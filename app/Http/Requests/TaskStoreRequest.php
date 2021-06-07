<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TaskStoreRequest extends FormRequest
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
            'title' => [
                'required', 'string'
            ],
            'description' => [
                'required', 'string'
            ],
            'date' => [
                'required', 'date'
            ],
            'hour' => [
                'required', 'date_format:H:i'
            ],
            'status' => [
                'integer'
            ],
            'overdue_completion' => [
                'nullable', 'boolean'
            ]
        ];
    }
}