<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|unique:employees|max:255',
            'last_name' => 'required|unique:employees|max:255',
            'company_id' => '',
            'email' => 'email',
            'phone' => ''
        ];
    }
}
