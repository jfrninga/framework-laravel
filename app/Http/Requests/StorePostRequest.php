<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StorePostRequest extends FormRequest
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
            'name' =>['required', 'max:255'],
            'email'=>['required','max:255', Rule::unique('users')],
            'avatar_url'=>['required'],
            'password'=>['required', Password::min('4')
            ->letters()
            ->uncompromised()
            ]
        ];
    }
}
