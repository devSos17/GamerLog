<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGame extends FormRequest
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
            'title'=>[
                'required',
                Rule::unique('games')->ignore( $this->route('game') ),
            ],
            'clasification'=>'required',
            'game_console_id'=>'required',
            'cost'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'All games have names',
            'cost'=>'Must be a number',
        ];
    }
}
