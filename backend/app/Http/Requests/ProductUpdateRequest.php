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
            'title' => 'sometimes|required|string',
            'category_id' => 'sometimes|required',
            'image' => 'nullable|string',
            'prices' => 'sometimes|required|array',
            'prices.*.storage_id' => 'sometimes|required|numeric',
            'prices.*.values' => ['sometimes','required', 'array', 'min:4'],
            'prices.*.values.*' => ['sometimes','required', 'numeric'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'prices.required' => 'Please, add price values',
            'prices.*.storage_id.required' => 'The storage field is required',
            'prices.*.values*.required' => 'The price fields are required',
            'prices.*.values.min' => 'Please, fill all the fields',
            'prices.*.values.*.required' => 'The price field is required',
        ];
    }
}
