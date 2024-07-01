<?php
namespace App\Http\Controllers;

use App\Http\Requests\Game\EditGameRequest;
use App\Http\Requests\Game\StoreGameRequest;
use App\Http\Requests\Game\UpdateGameRequest;
use App\Http\Resources\GameResource;
use App\Interfaces\GameRepositoryInterface;

class GameController extends Controller
{
    private GameRepositoryInterface $repository;

    public function __construct(GameRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function index()
    {
        $games = $this->repository->all();
        return GameResource::collection($games);
    }

    public function store(StoreGameRequest $request)
    {
        $request->validated();
        $game = $this->repository->create($request->all());

        return new GameResource($game);
    }

    public function findById($id)
    {
        $game = $this->repository->findById($id);
        return new GameResource($game);
    }

    public function update(UpdateGameRequest $request, $id)
    {
        $game = $this->repository->findById($id);
        $game->update($request->all());

        return new GameResource($game);
    }

    public function edit(EditGameRequest $request, $id)
    {
        $request->validated();

        $game = $this->repository->findById($id);
        $game->update($request->all());

        return new GameResource($game);
    }

    public function destroy($id)
    {
        $game = $this->repository->findById($id);
        $game->delete();

        return 'Game deleted successfully';
    }
}
