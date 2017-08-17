<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required',
            'url'           => [
                'nullable',
                'regex:/^[a-zA-Z0-9_\-\s]*$/'
            ],
            'category_id'   => 'nullable|numeric',
            'published_at'  => 'date_format:Y-m-d',
        ];
    }
}
