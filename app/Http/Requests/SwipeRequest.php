<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SwipeRequest extends FormRequest
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
            'like' => [
                'required',
                'boolean'
            ],
            'user_swipe_id' => [
                'required',
                'exists:user,id'        
            ]
        ];
    }
}
