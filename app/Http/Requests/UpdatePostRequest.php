<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|unique:posts,title,' . $this->route('post')->id,
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'feacture_image' => "nullable|mimes:jpeg,png|file|max:512"
        ];
    }
}
