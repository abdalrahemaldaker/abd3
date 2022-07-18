<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Update_Student_Request extends FormRequest
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
            'fname' => 'required',
            'lname' => 'required',
            'father' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'birthdate' => 'required',
            'note' => 'required',
            'email'     => 'required|email',
            'password'  => 'string|nullable|confirmed',
        ];
    }
}
