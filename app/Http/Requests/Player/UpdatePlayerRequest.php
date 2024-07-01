<?php

namespace App\Http\Requests\Player;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlayerRequest extends FormRequest
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
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'position' => 'sometimes|string|max:10',
            'height' => 'sometimes|string|max:10',
            'weight' => 'sometimes|integer',
            'jersey_number' => 'sometimes|string|max:10',
            'college' => 'nullable|string|max:255',
            'country' => 'sometimes|string|max:255',
            'draft_year' => 'sometimes|integer',
            'draft_round' => 'sometimes|integer',
            'draft_number' => 'sometimes|integer',
        ];
    }
}
