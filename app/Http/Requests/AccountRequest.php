<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AccountRequest extends Request
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
            'email' => 'required',
            'email_password' => 'required',
            'skype' => 'required',
            'skype_password' => 'required',
            'odesk' => 'required',
            'odesk_password' => 'required',
            'has_work' => 'required',
            'project' => 'required',
        ];
    }
}
