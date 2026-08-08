<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreCommandeRequest extends FormRequest
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
        return[
            'num_commande.integer' => 'Le numero de commande doit être un entier',
            'num_command.required'=>'Le numero de commande est obligatoire.',
            'num_commande.max'=>'Le numero de la commande  ne doit pas depasser 255 caractères.',
            //'categorie.required'=>'La categorie  est obligatoire.',
            //'categorie.string'=>'La categorie du produit doit être un chaine de caractères.',
            'prixunitaire.required'=>'Le prix du produit est obligatoire.',
            'price.numeric'=>'Le prix du produit doit être un nombre.',
            'price.min'=>'Le prix du produit doit être supérieur ou égal à 0.',
            'quantity.required'=>'La quantité du produit est obligatoire.',
            'quantity.integer'=>'La quantité du produit doit être un entier.',
            'quantity.min'=>'La quantité du produit doit être supérieur ou égal à 0.',
              
  

        ];
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
