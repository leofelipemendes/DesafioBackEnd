<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "conference",
        "division",
        "city",
        "name",
        "full_name",
        "abbreviation",
    ];

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function homeGames()
    {
        return $this->hasMany(Game::class, 'home_team_id');
    }

    public function visitorGames()
    {
        return $this->hasMany(Game::class, 'visitor_team_id');
    }
}
