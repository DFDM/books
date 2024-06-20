<?php

namespace App\Http\Requests\Sales;

use Illuminate\Foundation\Http\FormRequest;

class ApiStoreRequest extends FormRequest
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
            'buyer' => 'required',
            'buyer.*.id' => 'integer|nullable',
            'buyer.*.name' => 'string|nullable',
            'buyer.*.email' => 'email|nullable',
            'book_id' => 'required|array',
            'book_id.*' => 'integer',
        ];
    }
}
