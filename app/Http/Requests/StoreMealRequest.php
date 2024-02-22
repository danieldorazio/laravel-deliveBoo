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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
             'name' => ['required', 'max:200', 'min:5', 'string'],
             'image' => 'nullable|image',
             'description' => ['nullable', 'string', 'max:10000'],
             'price' => ['required', 'numeric', 'max:999.99'],
             'available' => ['required'],
             'restaurant_id' => ['nullable', 'numeric','exists:restaurants,id']
        ];
    }

    public function messages()
    {
        return [
             'name.required' => 'A meal name is needed',
             'name.max' => 'The maximum number of characters is 200',
             'name.min' => 'Minimum characters requred: 5',
             'name.string' => 'The name must be a string',
             'image.image' => 'Wrong file format',
             'description.max' => 'The maximum number of characters is 10000',
             'price.required' => 'A price is requred',
             'price.numeric' => 'Price must be a number',
             'price.max' => 'Price must be a smaller number',
        ];
    }
}
