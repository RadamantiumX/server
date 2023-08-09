<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EpikkamsgRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre'=>['required','max:55'],
            'email'=>['required','email'],
            'telefono'=>['required','max:20'],
            'mensaje'=>['required','max:400']
        ];
    }
}
