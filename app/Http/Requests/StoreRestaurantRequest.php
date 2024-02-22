<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
            'restaurant_name' => 'required|string|min:6|max:200',
            'image' => 'required|image',
            'piva_user' => 'required|min:11|max:11|unique:restaurants,piva_user',
            'street' => 'required|min:5|max:200',
            'time_open' => 'required',
            'time_close' => 'required'
        ];
    }

    public function messages() {
        return [
            'restaurant_name.required' => 'A name is required',
            'required_name.string' => 'The name must be a string',
            'restaurant_name.min' => 'The name must be at least :min characters long',
            'restaurant_name.max' => 'The name must be no longer than :max characters',
            'image.required' => 'A image is required',
            'image.image' => 'Wrong file format',
            'piva_user.min' => 'The P. Iva must be at least :min characters long',
            'piva_user.max' => 'The P. Iva must be no longer than :max characters long',
            'piva_user.required' => 'The P. Iva is required',
            'street.required' => 'An address is required',
            'street.min' => 'The street must be at least :min characters long',
            'street.max' => 'The street must be no longer than :max characters',
            'time_open.required' => 'An opeing time is required',
            'time_close.required' => 'A closing time is required',
        ];
    }
}
