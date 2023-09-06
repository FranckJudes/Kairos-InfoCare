<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUtilisateur extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'lastname' => 'required',
            'sexe' => 'required',
            'cni'  => 'required',
            'telephone' => 'required',
            'dateNaissance' => ['required','date'],
            'lieuNaissance' => 'required',
            'email' => 'required|unique',
            'entite_id' => 'nullable',
            'photo' => ['nullable','mimes:jpg,bmp,png,jpeg,pgp,'],
            'organisation' => 'nullable'
        ];
    }
}
