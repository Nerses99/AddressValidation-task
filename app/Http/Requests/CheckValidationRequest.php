<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckValidationRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'street' => ['required','string','max:100'],
            'city' => ['required','string','max:100'],
            'state' => ['required','string'],
            'zip_code' => ['required','string'],
        ];
    }
}
