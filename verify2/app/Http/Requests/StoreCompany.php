<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCompany extends FormRequest
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
            'ruc' => 'required|unique:companies.ruc|max:11|min:11',
            'email' => 'required|unique:companies.email|email',
            'telefono' => 'required|unique:companies.telefono|min:9',
        ];
    }

    public function messages()
    {
        return [
            'ruc.required' => '10011001',
            'ruc.unique' => '10011002',
            'ruc.max' => '10011003',
            'ruc.min' => '10011004',
            'email.required' => '10011001',
            'email.unique' => '10011002',
            'email.email' => '10011003',
            'telefono.required' => '10011001',
            'telefono.max' => '10011003',
            'telefono.min' => '10011004'
        ];
    }

    /*public function attributes()
    {
        return [
            'dni' => 'error',
        ];
    }*/

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        /*$err;
        foreach ($errors as $key => $values) {
            foreach ($values as $key => $value) {
                $err[] = $value;
            }
            //$err[] = $value;
        }*/
        throw new HttpResponseException(response()->json($errors));
    }
}
