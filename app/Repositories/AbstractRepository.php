<?php

namespace App\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class AbstractRepository
 * @package App\Repositories
 */
abstract class AbstractRepository
{
    /**
     * @var Model
     */
    protected Model $model;

    /**
     * AbstractRepository constructor.
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
        return $this->model::find($id);
    }

    /**
     * @return Collection|Model[]
     */
    public function all(): Collection|array
    {
        return $this->model->all();
    }

    /**
     * @param Request|array $request
     * @return Model|null
     * @throws Exception
     */
    public function create($data): ?Model
    {
        if ($data instanceof Request) {
            $data = $data->validated();
        }
        return $this->save($data);
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
     * @param Request|array $data
     * @param Model|null $model
     * @return Model|null
     * @throws Exception
     */
    public function update($data, ?Model $model): ?Model
    {
        if ($data instanceof Request) {
            $data = $data->validated();
        }
        return $this->save($data, $model);
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
