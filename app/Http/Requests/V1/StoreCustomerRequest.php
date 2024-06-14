<?php

namespace App\Http\Requests\V1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','max:30'],
            'email' => ['required','email','max:30'],
            'type' => ['required',Rule::in(['I','B','i','b'])],
            'address' => ['required','max:50'],
            'city' => ['required','max:30'],
            'state' => ['required','max:30'],
            'postalCode' => ['required']
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
        'postal_code' => $this->postalCode
        ]);
    }
}
