<?php

namespace App\Http\Requests\Contacts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'contact' => ['required', 'numeric'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('contacts')->where(
                    function ($query) {
                       return $query->whereNull('deleted_at');
                    }
                ),
            ],
        ];
    }
}
