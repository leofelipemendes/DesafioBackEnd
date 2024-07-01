<?php

namespace App\Repositories;

use App\Interfaces\GameRepositoryInterface;
use App\Models\Game;
use Illuminate\Database\Eloquent\Collection;

class GameRepository implements GameRepositoryInterface
{
    private Game $model;

    public function __construct(Game $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function findById($id): ?Game
    {
        return $this->model->find($id);
    }

    public function create(array $data): Game
    {
        return $this->model->create($data);
    }

    public function update($id, array $data): ?Game
    {
        $Game = $this->model->find($id);
        if ($Game) {
            $Game->update($data);
            return $Game;
        }
        return null;
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}
