<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Support\Facades\Http;
use App\Models\Player;
use App\Models\Team;

class FetchBallDontLieData extends Controller
{

    public function handle()
    {
        $this->fetchTeams();
        $this->fetchPlayers();
        $this->fetchGames();
    }

    public function fetchPlayers()
    {
        $response = Http::withHeaders([
            'Authorization' => 'eabe2808-4427-4606-832d-c83bf8f1cbc3'
        ])
            ->get('https://api.balldontlie.io/v1/players');
        $players = $response->json()['data'];

        foreach ($players as $playerData) {
            $teamId = $playerData['team']['id'];

            Player::updateOrCreate(
                ['id' => $playerData['id']],
                [
                    'first_name' => $playerData['first_name'],
                    'last_name' => $playerData['last_name'],
                    'position' => $playerData['position'],
                    'height' => $playerData['height'],
                    'weight' => $playerData['weight'],
                    'jersey_number' => $playerData['jersey_number'],
                    'college' => $playerData['college'],
                    'country' => $playerData['country'],
                    'draft_year' => $playerData['draft_year'],
                    'draft_round' => $playerData['draft_round'],
                    'draft_number' => $playerData['draft_number'],
                    'team_id' => $teamId
                ]
            );
        }
        return 'Players data fetched and stored successfully.';
    }

    public function fetchTeams()
    {
        $response = Http::withHeaders([
            'Authorization' => 'eabe2808-4427-4606-832d-c83bf8f1cbc3'
        ])
            ->get('https://api.balldontlie.io/v1/teams');
        $teams = $response->json()['data'];

        foreach ($teams as $teamData) {
            Team::updateOrCreate(
                ['id' => $teamData['id']],
                [
                    'conference' => $teamData['conference'],
                    'division' => $teamData['division'],
                    'city' => $teamData['city'],
                    'name' => $teamData['name'],
                    'full_name' => $teamData['full_name'],
                    'abbreviation' => $teamData['abbreviation'],
                ]
            );
        }
    }

    public function fetchGames()
    {
        $response = Http::withHeaders([
            'Authorization' => 'eabe2808-4427-4606-832d-c83bf8f1cbc3'
        ])
            ->get('https://api.balldontlie.io/v1/games', [
                'seasons' => [2023]
            ]);

        $seasons = $response->json()['data'];

        foreach ($seasons as $seasonData) {

            $homeTeamId = $seasonData['home_team']['id'];
            $visitorTeamId = $seasonData['visitor_team']['id'];

            Game::updateOrCreate(
                ['id' => $seasonData['id']],
                [
                    'date' => $seasonData['date'],
                    'season' => $seasonData['season'],
                    'status' => $seasonData['status'],
                    'period' => $seasonData['period'],
                    'time' => $seasonData['time'],
                    'postseason' => $seasonData['postseason'],
                    'home_team_score' => $seasonData['home_team_score'],
                    'visitor_team_score' => $seasonData['visitor_team_score'],
                    'home_team_id' => $homeTeamId,
                    'visitor_team_id' => $visitorTeamId,
                ]
            );
        }
    }
}
