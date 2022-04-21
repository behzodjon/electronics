<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'prices.*.storage_id' => 'required|numeric',
            'prices.*.values' => ['sometimes','required', 'array', 'min:4'],
            'prices.*.values.*' => ['required', 'numeric'],
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
