<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FactoryUpadteRequest extends FormRequest
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
        $id=session()->get('update_id');
        return [
         'name'=>'required',
         'email' => [
         'required',
         'email',
         'max:100',
         Rule::unique('factories', 'email')->ignore($id),
         ],
         'phoneNumber'=>['required', 'regex:/^[0-9]{10}$/'],
         'website'=>'required|url',
        ];
        session()->forget('update_id');
    }
}
