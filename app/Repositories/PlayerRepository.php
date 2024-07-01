<?php

namespace App\Repositories;

use App\Interfaces\PlayerRepositoryInterface;
use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;

class PlayerRepository implements PlayerRepositoryInterface
{
    private Player $model;

    public function __construct(Player $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function findById($id): ?Player
    {
        return $this->model->find($id);
    }

    public function findByName($name): ?Collection
    {
        return $this->model
        ->where('first_name', 'like', "%{$name}%")
        ->get();
    }

    public function create(array $data): Player
    {
        return $this->model->create($data);
    }

    public function update($id, array $data): ?Player
    {
        $Player = $this->model->find($id);
        if ($Player) {
            $Player->update($data);
            return $Player;
        }
        return null;
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}
