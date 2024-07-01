<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    private User $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function findById($id): ?User
    {
        return $this->model->find($id);
    }

    public function findByName($name): ?Collection
    {
        return $this->model
        ->where('name', 'like', "%{$name}%")
        ->get();
    }

    public function create(array $data): User
    {
        return $this->model->create($data);
    }

    public function update($id, array $data): ?User
    {
        $user = $this->model->find($id);
        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }

    public function delete($id): int
    {
        return $this->model->find($id)->delete();

    }
}
