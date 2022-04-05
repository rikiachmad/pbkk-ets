<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:255',
            'slug' => 'required|unique:books',
            'book_type' => 'required|in:magazine,textbook,paper',
            'image' => 'image|file|max:32768',
            'publisher' => 'required|max:40',
            'year_published' => 'required|numeric|min:1900|max:2018',
            'description' => 'required'
        ];

        return $rules;
    }
}
