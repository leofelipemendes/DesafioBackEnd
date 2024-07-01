<?php

namespace App\Repositories;

use App\Interfaces\TeamRepositoryInterface;
use App\Models\Team;
use Illuminate\Database\Eloquent\Collection;

class TeamRepository implements TeamRepositoryInterface
{
    private Team $model;

    public function __construct(Team $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function findById($id): ?Team
    {
        return $this->model->find($id);
    }

    public function findByName($name): ?Collection
    {
        return $this->model
        ->where('name', 'like', "%{$name}%")
        ->get();
    }

    public function create(array $data): Team
    {
        return $this->model->create($data);
    }

    public function update($id, array $data): ?Team
    {
        $team = $this->model->find($id);
        if ($team) {
            $team->update($data);
            return $team;
        }
        return null;
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}
