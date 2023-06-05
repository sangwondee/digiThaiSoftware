<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:companies|max:255',
            'address' => '',
            'email' => 'email|unique:companies',
            'logo' => 'image|max:100|mimes:jpg,jpeg,png',
            'website' => ''
        ];
    }
}
