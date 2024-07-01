<?php

namespace App\Interfaces;

use App\Models\Team;
use Illuminate\Database\Eloquent\Collection;

interface TeamRepositoryInterface
{
    public function all();

    public function findById($id);

    public function findByName($name);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);

}
