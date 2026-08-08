<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Override;

class registerRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email'=> ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password'=>['required', 'string', 'min:8', 'confirmed'],
            'role'=>['required', 'string']
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            'name.required' => 'Entrez votre nom.',
            'name.string' => 'le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'email.required' => 'L\'email est requis.',
            'email.email' => 'L\'email doit être une adresse email valide.',
            'email.max' => 'L\'email ne doit pas dépasser 255 caractères.',
            'email.unique' => 'L\'email est déjà utilisé.',
            'email.string'=>'Le mot de passe doit être une chaîne de caractères',
            'password.required' => 'Le mot de passe est requis.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
        ];


    }
    
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(
            response()->json([
            'message'=>'les données sont invalides',
            'data'=>$validator->errors()
        ]));

    }
}
