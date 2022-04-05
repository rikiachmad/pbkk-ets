<?php

namespace App\Http\Requests;


class StorePaperRequest extends StoreBookRequest
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
            'author' => 'required|max:40',
            'category' => 'required|max:30',
            'doi' => 'unique:papers'
        ];

        return $rules;
    }
}
