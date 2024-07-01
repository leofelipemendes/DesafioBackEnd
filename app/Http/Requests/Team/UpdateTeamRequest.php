<?php

namespace App\Http\Requests\Team;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamRequest extends FormRequest
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
            'conference' => 'sometimes|string|max:255',
            'division' => 'sometimes|string|max:255',
            'city' => 'sometimes|string|max:255',
            'name' => 'sometimes|string|max:255',
            'full_name' => 'sometimes|string|max:255',
            'abbreviation' => 'sometimes|string|max:10',
        ];
    }
}
