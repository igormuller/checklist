<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CakeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $sometimes = $this->getMethod() === 'PUT' ? "sometimes" : "";

        return [
            'name'     => $sometimes . '|required|unique:cakes',
            'weight'   => $sometimes . '|required',
            'value'    => $sometimes . '|required|regex:/^\d*(\.\d{1,2})?$/',
            'quantity' => $sometimes . '|required',
        ];
    }
}
