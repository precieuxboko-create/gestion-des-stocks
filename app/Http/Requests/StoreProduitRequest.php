<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class StoreProduitRequest extends FormRequest
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
            'name'=>['required', 'string', 'max:255'],
            'description'=>['required', 'string'],
            'price'=>['required', 'numeric', 'min:0'],
            'quantity'=>['required', 'integer', 'min:0']
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'Le nom du produit est obligatoire.',
            'name.string'=>'Le nom du produit doit être une chaine de caractères.',
            'name.max'=>'Le nom du produit ne doit pas depasser 255 caractères.',
            'description.required'=>'La description dui produit est obligatoire.',
            'description.string'=>'La dsecription du produit doit être un chaine de caractères.',
            'price.required'=>'Le prix du produit est obligatoire.',
            'price.numeric'=>'Le prix du produit doit être un nombre.',
            'price.min'=>'Le prix du produit doit être supérieur ou égal à 0.',
            'quantity.required'=>'La quantité du produit est obligatoire.',
            'quantity.integer'=>'La quantité du produit doit être un entier.',
            'quantity.min'=>'La quantité du produit doit être supérieur ou égal à 0.',  

        ];
    }
//A UTILISÉ POUR DEVELOPPER UNE API
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(
            response()->json([
            'success'=>false,
            'message'=>'les données sont invalides',
            'data'=>$validator->errors()
        ]));

    }
        

    
}
