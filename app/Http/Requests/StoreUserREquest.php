<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserREquest extends FormRequest
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
            "nom"=>["required","string"],
            "prenom"=>["required","string"],
            'matricule'=>["required","integer","unique:users,matricule"],
            'telephone'=>["required","string","max:14","min:10","unique:users,telephone"],
            'profession'=>["required","string"],
            'email'=>["required","string","unique:users,email"],
            'password'=>["required","string","max:12","min:8"],
            
        ];
    }


    public function messages(){

        return [
            "nom.required"=>"veuillez renseigner le nom",
            "prenom.required"=>"veuillez renseigner le prenom",

            "matricule.required"=>"veuillez renseigner le matricule",
            "matricule.unique"=>"Cette matricule est utilisé",


            "telephone.required"=>"veuillez renseigner le numero d'appel",
            "telephone.max"=>"14 chiffre maximum",
            "telephone.min"=>"10 chiffre minimum",
            "telephone.unique"=>"Cette numero d'appel est utilisé !",

            "password.required"=>"veuillez renseigner le mot de passe",
            "password.max"=>"12 caractere maximun",
            "password.min"=>"8 charactere minimum",
            "password.confirmed"=>"veuillez confirmez le mdp",

            "email.required"=>"veuillez renseigner l'email",
            "email.unique"=>"Cette email est utilisé !"
        ];
    }
}
