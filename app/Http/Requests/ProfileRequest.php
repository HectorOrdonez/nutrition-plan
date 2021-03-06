<?php

namespace App\Http\Requests;

class ProfileRequest extends Request
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
            'calories' => 'required|numeric|min:1|max:10000',
            'carbohydrates' => 'required|numeric|min:1|max:10000',
            'proteins' => 'required|numeric|min:1|max:10000',
            'fats' => 'required|numeric|min:1|max:10000',
        ];
    }
}
