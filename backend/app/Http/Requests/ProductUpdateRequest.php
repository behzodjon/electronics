<?php

namespace App\Http\Requests;

use App\Rules\PriceValue;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'category_id' => 'required',
            'image' => 'nullable|string',
            'prices' => 'required|array',
            'prices.*.values' =>['required','array'],
            'prices.*.values.*' =>['required','numeric'],
        ];
    }
}
