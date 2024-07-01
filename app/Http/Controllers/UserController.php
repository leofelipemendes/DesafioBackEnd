<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function create(StoreUserRequest $request)
    {
       $request->validated();

       $user = $this->repository->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin
        ]);

       return new UserResource($user);
    }

    public function all()
    {
        $users = $this->repository->all();
        return UserResource::collection($users);
    }

    public function findById($id)
    {
        $user = $this->repository->findById($id);
        return new UserResource($user);
    }

    public function findByName($name)
    {
        $user = $this->repository->findByName($name);
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $request->validated();

        $user = $this->repository->findById($id);

        if (isset($request->password)) {
            $request->password = Hash::make($request->password);
        }

        $user->update($request->all());

        return new UserResource($user);
    }


    public function edit(EditUserRequest $request, $id)
    {
        $request->validated();

        $user = $this->repository->findById($id);
        $user->update($request->all());

        return new UserResource($user);
    }

    public function destroy($id)
    {
        $user = $this->repository->findById($id);
        $user->delete();

        return 'User deleted successfully';
    }
}
