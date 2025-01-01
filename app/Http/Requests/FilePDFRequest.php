<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilePDFRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
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
            'name' => 'required|string|min:3|max:120',
            'description' => 'required|string|min:3|max:120',
            'file_name' => 'required|string|min:3|max:120',
            'file_extension' => 'required|string|min:3|max:120',
            //'file_storage' => 'required|file|mimes:pdf|max:30720',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'file_storage' => 'archivo pdf',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El nombre del archivo es requerido',
            'description.required' => 'La descripción del archivo es requerido0',
            'file_name.required' => 'El nombre del archivo es requerido',
            'file_extension.required' => 'La extensión del archivo es requerido',
            'file_storage.required' => 'El archivo es requerido',
        ];
    }
}
