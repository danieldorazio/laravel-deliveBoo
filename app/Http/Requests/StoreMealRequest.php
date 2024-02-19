<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMealRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:200', 'min:5'],
            'image' => ['nullable'],
            'description' => ['nullable'],
            'price' => ['required', 'numeric']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A restaurant name is needed',
            'name.max' => 'The maximum number of characters is 200',
            'name.min' => 'Minimum characters requred 5',
            'price.required' => 'A pirce is requred',
            'price.numeric' => 'Price must be a number',
        ];
    }
}
