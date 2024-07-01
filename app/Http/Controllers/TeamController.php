<?php

namespace App\Http\Controllers;

use App\Http\Requests\Team\EditTeamRequest;
use App\Http\Requests\Team\StoreTeamRequest;
use App\Http\Requests\Team\UpdateTeamRequest;
use App\Http\Resources\TeamResource;
use App\Interfaces\TeamRepositoryInterface;

class TeamController extends Controller
{
    private TeamRepositoryInterface $repository;

    public function __construct(TeamRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function all()
    {
        $teams = $this->repository->all();
        return TeamResource::collection($teams);
    }

    public function store(StoreTeamRequest $request)
    {
        $request->validated();
        $team = $this->repository->create($request->all());
        return new TeamResource($team);
    }

    public function findById($id)
    {
        $team = $this->repository->findById($id);
        return new TeamResource($team);
    }

    public function findByName($name)
    {
        $team = $this->repository->findByName($name);
        return new TeamResource($team);
    }

    public function update(UpdateTeamRequest $request, $id)
    {
        $request->validated();
        $team = $this->repository->findById($id);

        $team->update($request->all());

        return new TeamResource($team);
    }

    public function edit(EditTeamRequest $request, $id)
    {
        $request->validated();

        $team = $this->repository->findById($id);
        $team->update($request->all());

        return new TeamResource($team);
    }

    public function destroy($id)
    {
        $team = $this->repository->findById($id);
        $team->delete();

        return 'Team deleted successfully';
    }
}
