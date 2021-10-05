<?php

namespace Tests\Feature;

use App\Models\Fixture;
use App\Models\Game;
use App\Models\Leg;
use App\Models\Player;
use App\Models\Set;
use App\Models\Turn;
use App\Repositories\AbstractRepository;
use App\Repositories\FixtureRepository;
use App\Repositories\GameRepository;
use App\Repositories\LegRepository;
use App\Repositories\PlayerRepository;
use App\Repositories\SetRepository;
use App\Repositories\TurnRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class RepositoriesTest extends TestCase
{
    /**
     * @var array<string, string>
     */
    private array $map = [
        Fixture::class => FixtureRepository::class,
        Game::class    => GameRepository::class,
        Leg::class     => LegRepository::class,
        Player::class  => PlayerRepository::class,
        Set::class     => SetRepository::class,
        Turn::class    => TurnRepository::class
    ];

    /**
     * @param string $model
     * @param string $repository
     * @return array<Model, AbstractRepository>
     */
    private function getPair(string $model, string $repository): array
    {
        return [
            new $model(),
            app($repository)
        ];
    }

    public function testGet()
    {
        Artisan::call('migrate:fresh --seed');
        foreach ($this->map as $model => $repository) {
            $pair = $this->getPair($model, $repository);
            $model = $pair[0];
            $repository = $pair[1];
            //
            $expected = $model::factory()->create();
            $actual = $repository->get($expected->id);
            $actual = collect($actual->getAttributes())->filter(function ($value, $key) {
                return $value !== null;
            });
            $expected = collect($expected->getAttributes())->filter(function ($value, $key) {
                return $value !== null;
            });
            $this->assertEquals($expected, $actual);
        }
    }

    public function testAll()
    {
        foreach ($this->map as $model => $repository) {
            Artisan::call('migrate:fresh');
            $pair = $this->getPair($model, $repository);
            $model = $pair[0];
            $repository = $pair[1];
            $model::factory()->count(10)->create();
            $actual = $repository->all()->count();
            $this->assertEquals(10, $actual);
        }
        Artisan::call('migrate:fresh --seed');
    }

    public function testCreate()
    {
        Artisan::call('migrate:fresh --seed');
        foreach ($this->map as $model => $repository) {
            $pair = $this->getPair($model, $repository);
            $model = $pair[0];
            $repository = $pair[1];
            $model = $model::factory()->make();
            $repository->create($model->getAttributes());
            foreach ($model->getAttributes() as $key => $value) {
                $this->assertDatabaseHas($model->getTable(), [$key => $value]);
            }
        }
    }

    public function testUpdate()
    {
        Artisan::call('migrate:fresh --seed');
        foreach ($this->map as $model => $repository) {
            $pair = $this->getPair($model, $repository);
            $model = $pair[0];
            $repository = $pair[1];
            $old = $model::factory()->create();
            $new = $model::factory()->make(['id' => $old->id]);
            $repository->update($new->getAttributes(), $old);
            unset($old['id']);
            $this->assertModelExists($new);
            $this->assertModelMissing($old);
        }
    }

    public function testDelete()
    {
        Artisan::call('migrate:fresh --seed');
        foreach ($this->map as $model => $repository) {
            $pair = $this->getPair($model, $repository);
            $model = $pair[0];
            $repository = $pair[1];
            $model = $model::factory()->create();
            $repository->delete($model);
            $this->assertDatabaseMissing($model->getTable(), ['id'         => $model->id,
                                                              'deleted_at' => null
            ]);
        }
    }
}
