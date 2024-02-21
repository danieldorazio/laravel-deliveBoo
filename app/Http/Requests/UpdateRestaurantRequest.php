<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
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
            'restaurant_name' => 'required|min:3|max:200',
            'image' => 'required',
            // 'slug' => 'required',
            'piva_user' => 'required|min:11|max:11|unique:restaurants',
            'street' => 'required',
            'time_open' => 'required',
            'time_close' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'restaurant_name.required' => 'A name is required',
            'restaurant_name.min' => 'The name must be at least :min characters long',
            'restaurant_name.max' => 'The name must be no longer than :max characters',
            // 'slug.required' => 'A slug title is required',
            'piva_user.min' => 'The P. Iva must be at least :min characters long',
            'piva_user.max' => 'The P. Iva must be no longer than :max characters long',
            'street.required' => 'An address is required',
            'time_open.required' => 'An opeing time is required',
            'time_close.required' => 'A closing time is required',
        ];
    }
}
