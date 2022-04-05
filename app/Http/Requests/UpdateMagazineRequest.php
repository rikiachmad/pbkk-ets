<?php

namespace App\Http\Requests;

class UpdateMagazineRequest extends UpdateBookRequest
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
        if($this->oldIssn !== $this->issn) {
            $rules += [
                'issn' => 'required|unique:magazines',
            ];
        }
        else {
            $rules += [
                'issn' => 'required',
            ];
        }

        return $rules;
    }
}
