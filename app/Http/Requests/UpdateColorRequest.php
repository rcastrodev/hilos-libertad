<?php

namespace App\Http\Requests;

use App\Color;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateColorRequest extends FormRequest
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
        $color = Color::find($this->id);
        return [
            'id'    => 'required',
            'name'  => ['required', Rule::unique('colors')->ignore($color)],
            'exa'   => ['required', Rule::unique('colors')->ignore($color)],
        ];
    }

    public function messages()
    {
        return [
            'id.required'   => 'ID es requerido',
            'name.required' => 'Nombre del color es requerido',
            'name.unique'   => 'Nombre del color ya se encuentra registrado',
            'exa.required'  => 'Color es requerido',
            'exa.unique'    => 'el color ya se encuentra registrado',
        ];
    }
}
