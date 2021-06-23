<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TaskUpdateRequest extends FormRequest
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
                'required_without:report', 'string'
            ],
            'description' => [
                'required_without:report', 'string'
            ],
            'date' => [
                'required_without:report', 'date'
            ],
            'hour' => [
                'required_without:report', 'date_format:H:i'
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
