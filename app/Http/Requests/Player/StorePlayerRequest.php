<?php

namespace App\Http\Requests\Player;

use Illuminate\Foundation\Http\FormRequest;

class StorePlayerRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'position' => 'required|string|max:10',
            'height' => 'required|string|max:10',
            'weight' => 'required|integer',
            'jersey_number' => 'required|string|max:10',
            'college' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'draft_year' => 'required|integer',
            'draft_round' => 'required|integer',
            'draft_number' => 'required|integer',
        ];
    }
}
