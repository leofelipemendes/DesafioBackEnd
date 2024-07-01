<?php

namespace App\Interfaces;

use App\Models\Game;
use Illuminate\Database\Eloquent\Collection;

interface GameRepositoryInterface
{
    public function all(): Collection;

    public function findById($id): ?Game;

    public function create(array $data): Game;

    public function update($id, array $data): ?Game;

    public function delete($id);

}
