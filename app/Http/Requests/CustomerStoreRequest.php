<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
            'firstname' => 'required|min:1',
            'lastname' => 'required|min:1',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'firstname.required' => 'Veuillez renseigner le prénom de l\'utilisateur !',
            'lastname.required' => 'Veuillez renseigner le nom de l\'utilisateur !',
            'firstname.min' => 'Veuillez rentrer au minimum 2 caractères pour le nom !',
            'lastname.min' => 'Veuillez rentrer au minimum 2 caractères pour le prénom !',
            'email.required' => 'Veuillez renseigner l\'email de l\'utilisateur !',
            'email.email' => 'Veuillez rentrer un email valide !',
            'password.required' => 'Veuillez renseigner le mot de passe de l\'utilisateur !',
            'password.min' => 'La mot de passe doit comporter au minimum 8 caractères !',
        ];
    }
}
