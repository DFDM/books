<?php

namespace App\Http\Requests\Books;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'title' => 'string|nullable',
            'description' => 'string|nullable',
            'price' => 'string|in:desc,asc|nullable',
            'quantity' => 'string|in:desc,asc|nullable',
            'instock' => 'string|in:true,false|nullable',
            'avatars' => 'string|in:true,false|nullable',
            'orders' => 'string|in:desc,asc|nullable',
            'rankOrSalesAbove' => 'string|in:true,false|nullable'
        ];
    }
}
