<?php

namespace App\Http\Requests\Team;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
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
            'conference' => 'required|string|max:255',
            'division' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'abbreviation' => 'required|string|max:10',
        ];
    }
}
