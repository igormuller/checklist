<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterestedRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $sometimes = $this->getMethod() === 'PUT' ? "sometimes" : "";

        return [
            'cake_id' => $sometimes . '|required|exists:cakes,id',
            'name'    => $sometimes . '|nullable',
            'email'   => $sometimes . '|required|unique:interested,email,' . $this->id . ',id,cake_id,' .
                         $this->cake_id,
        ];
    }
}
