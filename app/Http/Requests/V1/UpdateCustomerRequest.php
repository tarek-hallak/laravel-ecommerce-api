<?php

namespace App\Http\Requests\V1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
        $method = $this->method();
        if($method == 'PUT'){
        return [
            'name' => ['required','max:30'],
            'email' => ['required','email','max:30'],
            'type' => ['required',Rule::in(['I','B','i','b'])],
            'address' => ['required','max:50'],
            'city' => ['required','max:30'],
            'state' => ['required','max:30'],
            'postalCode' => ['required']
        ];
    }else{
        return [
            'name' => ['sometimes','required','max:30'],
            'email' => ['sometimes','required','email','max:30'],
            'type' => ['sometimes','required',Rule::in(['I','B','i','b'])],
            'address' => ['sometimes','required','max:50'],
            'city' => ['sometimes','required','max:30'],
            'state' => ['sometimes','required','max:30'],
            'postalCode' => ['sometimes','required']
        ];
    }
    }

    protected function prepareForValidation(){
        if($this->postalCode){
            $this->merge([
            'postal_code' => $this->postalCode
            ]);
        }
    }
}
