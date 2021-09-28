<?php

namespace App\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class Repository
 * @package App\Repositories
 */
abstract class Repository
{
    /**
     * @var Model
     */
    protected Model $model;

    /**
     * Repository constructor.
     *
     * @param Model $model
     */
    protected function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     * @return Model|null
     */
    public function get($id): ?Model
    {
        return $this->model->get($id);
    }

    /**
     * @return Collection|Model[]
     */
    public function all(): Collection|array
    {
        return $this->model->all();
    }

    /**
     * @param Request $request
     * @return Model|null
     * @throws Exception
     */
    public function create(Request $request): ?Model
    {
        return $this->save($request->validated());
    }

    /**
     * @param array $data
     * @param Model|null $model
     *
     * @return Model|null
     * @throws Exception
     */
    private function save(array $data, Model $model = null): ?Model
    {
        DB::beginTransaction();

        try {
            $this->model = $model ?? $this->model->newInstance();
            $this->model->fill($data);
            $this->model->save();

            DB::commit();

            return $this->model;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * @param Request $request
     * @param Model|null $model
     * @return Model|null
     * @throws Exception
     */
    public function update(Request $request, ?Model $model): ?Model
    {
        return $this->save($request->validated(), $model);
    }

    /**
     * @param Model $model
     *
     */
    public function delete(Model $model): void
    {
        DB::beginTransaction();

        try {
            $model->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
