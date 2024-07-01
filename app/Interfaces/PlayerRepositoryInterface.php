<?php

namespace App\Interfaces;

use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;

interface PlayerRepositoryInterface
{
    public function all(): Collection;

    public function findById($id): ?Player;

    public function findByName($name): ?Collection;

    public function create(array $data): Player;

    public function update($id, array $data): ?Player;

    public function delete($id);

}
