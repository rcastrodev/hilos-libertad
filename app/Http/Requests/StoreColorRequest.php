<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreColorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|unique:colors',
            'exa'   => 'required|unique:colors',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre del color es requerido',
            'name.unique'   => 'Nombre del color ya se encuentra registrado',
            'exa.required'  => 'Color es requerido',
            'exa.unique'    => 'el color ya se encuentra registrado',
        ];
    }
}
