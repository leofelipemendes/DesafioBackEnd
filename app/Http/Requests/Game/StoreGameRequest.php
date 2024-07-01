<?php

namespace App\Http\Requests\Game;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
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
            'date' => 'required|date',
            'season' => 'required|integer',
            'status' => 'required|string|max:10',
            'period' => 'required|integer',
            'time' => 'required|string|max:10',
            'postseason' => 'required|integer',
            'home_team_score' => 'required|integer',
            'visitor_team_score' => 'required|integer',
            'home_team_id' => 'required|integer',
            'visitor_team_id' => 'required|integer',
        ];
    }
}
