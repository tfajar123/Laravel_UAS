<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateTabRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:50,'.$this->tab->id,
            'description' => 'required|string|max:20',
            'genre' => 'required|string',
            'price' => 'required',
            'price_member' => 'required',
            'images' => 'mimes:jpg,jpeg,png,webp|max:3000'
        ];
    }
}
