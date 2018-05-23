<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataRequest extends FormRequest
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
            'firstname' => 'required',
            'surname'   => 'required',
            'email'     => 'required|email',
            'telephone' => 'required|phone:GB,mobile|max:20',
            'gender'    => 'required',
            'dob'       => 'required|date_format:"d/m/Y"'
        ];
    }
}
