<?php

namespace App\Http\Requests;

use App\Models\Blog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBlogRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('blog_edit');
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
                'unique:blogs,slug,' . request()->route('blog')->id,
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
