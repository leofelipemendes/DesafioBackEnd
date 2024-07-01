<?php

namespace App\Http\Requests\Game;

use Illuminate\Foundation\Http\FormRequest;

class EditGameRequest extends FormRequest
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
            'date' => 'sometimes|date',
            'season' => 'sometimes|integer',
            'status' => 'sometimes|string|max:10',
            'period' => 'sometimes|integer',
            'time' => 'sometimes|string|max:10',
            'postseason' => 'sometimes|integer',
            'home_team_score' => 'sometimes|integer',
            'visitor_team_score' => 'sometimes|integer',
            'home_team_id' => 'sometimes|integer',
            'visitor_team_id' => 'sometimes|integer',
        ];
    }
}
