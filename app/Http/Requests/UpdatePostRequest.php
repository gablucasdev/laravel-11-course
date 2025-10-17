<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'min:3',
                'max:200'
            ],
            'slug' => [
                'required',
                'string',
                Rule::unique('posts', 'id')->ignore($this->id),
                'min:3',
                'max:200'
            ],
            'content' => [
                'sometimes',
                'string',
                'min:3',
                'max:200'
            ],
            'status' => [
                'required',
                Rule::in(['draft', 'published']),
                'string',
                'min:3',
                'max:200'
            ],
            'visibility' => [
                'required',
                Rule::in(['public', 'private']),
                'string',
                'min:3',
                'max:200'
            ],
        ];
    }
}
