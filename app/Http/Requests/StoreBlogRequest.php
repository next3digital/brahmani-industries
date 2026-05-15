<?php

namespace App\Http\Requests;

use App\Models\Blog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBlogRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('blog_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'required',
                'unique:blogs',
            ],
            'gallary' => [
                'array',
            ],
            'meta_title' => [
                'string',
                'nullable',
            ],
            'sort_description' => [
                'required',
            ],
        ];
    }
}
