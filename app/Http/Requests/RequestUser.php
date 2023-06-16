<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUser extends FormRequest
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
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profession' => ['required', 'string', 'max:255'],
            'classe' => [ 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'matricule' => ['required', 'integer','unique:users', 'max:9999'],
            'telephone' => ['required', 'string','min:10', 'max:14','unique:users']
        ];
    }

    /**
     * message d'erreur
     */

     public function messages()
     {
        $messages ="Veuillez renseigner le champs ";
        return [
            'nom.required' => $messages."nom",
            'prenom.required' => $messages."prénom",
            'matricule.required' => $messages."matricule",
            'email.required' => $messages."email",
            'password.required' => $messages."mot de passe",
            'profession.required' => $messages."profession",
            'telephone.required' => $messages."numéro téléphone",
            'telephone.unique' => "Cette numéro téléphone existe deja ",

            'nom.string' => "Le nom est de type string",
            'prenom.string' =>"Le prénom est de type string",
            'email.string' => "L'email est de type string",
            'matricule.integer' => "Le matricule est de type integer",
            'matricule.max' => "Le taille maximale est 9999",
            'telephone.min' =>"Le numéro d'appel doit  avoir au moins 10 chiffre",
            'telephone.max' =>"Le numéro d'appel doit avoir au maximum 15 chiffre",
            'password.confirmed' =>"Veuillez confirmer le mot de passe",

            'email.unique' =>"Cette email a deja une compte",
            'matricule.unique' =>"Cette matricule est deja lié a une compte",


        ];
     }
}

