<?php

namespace App\Http\Requests;

class UpdateMealTypeRequest extends Request
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
            'name' => 'string',
            'calories' => 'numeric|min:0',
            'proteins' => 'numeric|min:0',
            'fats' => 'numeric|min:0',
            'carbohydrates' => 'numeric|min:0',
        ];
    }
}
