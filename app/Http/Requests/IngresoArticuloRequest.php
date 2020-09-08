<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IngresoArticuloRequest extends FormRequest
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
        //required|array|min:3
        return [
            'IdProveedor' => [
                'required'
            ],
            'CodigoEstadoIngreso' => [
                'min:1', Rule::in(['F', 'I','A']),
            ],
//            'articulos' => [
//                'required', 'min:1', 'array',
//            ],
            'codigos' => [
                'required', 'min:1', 'array',
            ],
            'codigos.*' => [
                'distinct','exists:articulos,IdArticulo',
            ],
        ];
    }

    public function messages()
    {
        return [
            'IdProveedor.required' => 'Toda compra necesita un proveedor',
//            'CodigoEstadoIngreso.required'  => 'Debe Seleccionar un estado de la compra',
            'CodigoEstadoIngreso.min'  => 'Este campo solo acepta abreviaciones de una letra',
            'CodigoEstadoIngreso.in'  => 'No puede ingresar el caracter introducido',
            'codigos.required'  => 'No puede realizar una compra sin al menos tener un articulo registrado',
            'codigos.min'  => 'No puede realizar una compra sin al menos tener un articulo registrado',
//            'codigos.*.integer'  => 'Los Codigos de elementos deben ser valores enteros',
            'codigos.*.distinct'  => 'No puede ingresar Codigos Repetidos, el valor de uno de los codigos, ya se encuentra en la lista',
            'codigos.*.exists'  => 'El código ingresado no existe en la base de datos',

        ];
    }
}
