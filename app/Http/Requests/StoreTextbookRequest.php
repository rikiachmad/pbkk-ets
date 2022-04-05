<?php

namespace App\Http\Requests;

class StoreTextbookRequest extends StoreBookRequest
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
        $rules = parent::rules();
        $rules += [
            'isbn' => 'required|unique:textbooks|max:13',
            'author' => 'required|max:40',
            'edition' => 'required|numeric',
            'category' => 'required|max:30',
        ];

        return $rules;
    }
}
