<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestCreationRequest extends FormRequest
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
            'SOA' =>['required','numeric'],
            'ISI' =>['required','numeric'],
            'pause' =>['required','numeric'],
            'experimenter_id' =>['required','numeric'],
            'test_type_id' => ['required','numeric'],
        ];
    }
}
