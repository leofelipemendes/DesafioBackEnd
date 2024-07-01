<?php
namespace App\Http\Controllers;

use App\Http\Requests\Player\EditPlayerRequest;
use App\Http\Requests\Player\StorePlayerRequest;
use App\Http\Requests\Player\UpdatePlayerRequest;
use App\Http\Resources\PlayerResource;
use App\Interfaces\PlayerRepositoryInterface;

class PlayerController extends Controller
{
    private PlayerRepositoryInterface $repository;

    public function __construct(PlayerRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function index()
    {
        $players = $this->repository->all();
        return PlayerResource::collection($players);
    }

    public function store(StoreplayerRequest $request)
    {
        $request->validated();

        $player = $this->repository->create($request->all());

        return new PlayerResource($player);
    }

    public function findById($id)
    {
        $player = $this->repository->findById($id);
        return new PlayerResource($player);
    }

    public function findByName($name)
    {
        $player = $this->repository->findByName($name);
        return new PlayerResource($player);
    }

    public function update(UpdatePlayerRequest $request, $id)
    {
        $request->validated();

        $player = $this->repository->findById($id);
        $player->update($request->all());

        return new PlayerResource($player);
    }

    public function edit(EditPlayerRequest $request, $id)
    {
        $request->validated();

        $player = $this->repository->findById($id);
        $player->update($request->all());

        return new PlayerResource($player);
    }

    public function destroy($id)
    {
        $player = $this->repository->findById($id);
        $player->delete();

        return 'Player deleted successfully';
    }
}
