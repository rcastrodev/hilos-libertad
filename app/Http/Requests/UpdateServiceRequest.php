<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            'id'        => 'required',
            'order'     => 'required',
            'image'     => 'mimes:svg|nullable',
            'content_1' => 'required|string',
            'content_2' => 'required|string',
            'content_3' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'id.required'       => 'ID del elemento es requerido',
            'order.required'    => 'Orden requerido',
            'image.mimes'       => 'La imagen debe tener formato svg',
            'content_1.required'=> 'El título es requerido',
            'content_2.required'=> 'El contenido  es requerido',
            'content_3.required'=> 'El contenido  es requerido',
        ];
    }
}
