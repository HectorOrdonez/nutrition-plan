<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateIngredientRequest extends Request
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
            'dish_id' => 'required|numeric|min:1',
            'food_id' => 'required|numeric|min:1',
            'amount' => 'required|numeric|min:1|max:10000'
        ];
    }
}
