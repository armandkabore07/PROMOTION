<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationResquest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'libelle' => 'required|min:3|max:50|unique:informations',
            'dateInfo' => 'required |max:12',
             'commentaire' => 'required | max:250',
     ];
    }
}
