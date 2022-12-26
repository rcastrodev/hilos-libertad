<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'id' => 'required',
            'content_1' => 'required|string',
            'content_2' => 'required|string',
            'image'     => 'nullable|mimes:jpeg,jpg,png,svg'
        ];
    }

    public function messages()
    {
        return [
            'id.required'       => 'ID del elemento es requerido',
            'content_1.required'=> 'El título es requerido',
            'content_2.required'=> 'El contenido es requerido',
            'image.mimes'       => 'Solo se aceptan archivos con extension jpeg, jpg, png, svg',
        ];
    }
}
