<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateCommandeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
            'num_commande'=>['required', 'integer'],
            'produit'=>['required', 'string'],
            //'categorie'=>['required', 'string', 'min:0'],
            'quantity'=>['required', 'integer', 'min:0'],
            
            'prixUnitaire'=>['required', 'numeric', 'min:0']
     
        ];
    }

    public function messages(){

    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(
            response()->json([
            'success'=>false,
            'message'=>'les données sont invalides',
            'data'=>$validator->errors()
        ]));

    }



    
}
