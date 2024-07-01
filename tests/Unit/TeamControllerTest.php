<?php

namespace Tests\Unit;

use Tests\TestCase;
use Mockery;
use App\Models\Team;
use App\Http\Controllers\TeamController;
use App\Interfaces\TeamRepositoryInterface;
use App\Http\Requests\Team\StoreTeamRequest;
use App\Http\Requests\Team\UpdateTeamRequest;
use App\Http\Requests\Team\EditTeamRequest;
use App\Http\Resources\TeamResource;
use App\ApiResponse\ApiResponseClass;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->repository = Mockery::mock(TeamRepositoryInterface::class);
        $this->controller = new TeamController($this->repository);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testAll()
    {
        $teams = Team::factory()->count(3)->make();
        $this->repository->shouldReceive('all')->once()->andReturn($teams);

        $response = $this->controller->all();

        $this->assertEquals(TeamResource::collection($teams), $response);
    }

    public function testStore()
    {
        $teamData = Team::factory()->make()->toArray();
        $request = Mockery::mock(StoreTeamRequest::class);
        $request->shouldReceive('validated')->once()->andReturn(true);
        $request->shouldReceive('all')->once()->andReturn($teamData);

        $this->repository->shouldReceive('create')
        ->once()
        ->with($teamData)
        ->andReturn((object) $teamData);

        $response = $this->controller->store($request);

        $this->assertEquals(new TeamResource((object) $teamData), $response);
    }

    public function testFindById()
    {
        $team = Team::factory()->make();
        $this->repository->shouldReceive('findById')
        ->once()
        ->with($team->id)
        ->andReturn($team);

        $response = $this->controller->findById($team->id);

        $this->assertEquals(new TeamResource($team), $response);
    }

    public function testFindByName()
    {
        $team = Team::factory()->make();
        $this->repository->shouldReceive('findByName')
        ->once()
        ->with($team->name)
        ->andReturn($team);

        $response = $this->controller->findByName($team->name);

        $this->assertEquals(new TeamResource($team), $response);
    }

    public function testUpdate()
    {
        $team = Team::factory()->make();
        $updatedData = Team::factory()->make()->toArray();
        $request = Mockery::mock(UpdateTeamRequest::class);
        $request->shouldReceive('validated')->once()->andReturn(true);
        $request->shouldReceive('all')->once()->andReturn($updatedData);

        $this->repository->shouldReceive('findById')
        ->once()
        ->with($team->id)
        ->andReturn($team);

        $response = $this->controller->update($request, $team->id);

        $this->assertEquals(new TeamResource($team), $response);
    }

    public function testEdit()
    {
        $team = Team::factory()->make();
        $updatedData = Team::factory()->make()->toArray();
        $request = Mockery::mock(EditTeamRequest::class);
        $request->shouldReceive('validated')->once()->andReturn(true);
        $request->shouldReceive('all')->once()->andReturn($updatedData);

        $this->repository->shouldReceive('findById')
        ->once()
        ->with($team->id)
        ->andReturn($team);

        $response = $this->controller->edit($request, $team->id);

        $this->assertEquals(new TeamResource($team), $response);
    }

    public function testDestroy()
    {
        $team = Team::factory()->make();
        $this->repository->shouldReceive('findById')
        ->once()
        ->with($team->id)
        ->andReturn($team);

        $response = $this->controller->destroy($team->id);

        $this->assertEquals('Team deleted successfully', $response);
    }
}
