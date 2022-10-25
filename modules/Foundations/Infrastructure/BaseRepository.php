<?php

namespace Meraki\Foundations\Infrastructure;

use Illuminate\Database\Eloquent\Model;
use Meraki\Foundations\Contracts\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function newQuery()
    {
        return $this->model->query();
    }

    /**
     * Retrieve rows with limit and offset.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function selectAll($limit = 10)
    {
        return $this->model->paginate($limit);
    }

    /**
     * Insert a row with given attributes.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function insert(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Select a row that corresponds to the ID.
     *
     * @param  int|string  $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function selectById(int|string $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Update a row that corresponds to the ID with given attributes.
     *
     * @param  int|string  $id
     * @param  array       $attributes
     * @return bool
     */
    public function updateById(int|string $id, array $attributes)
    {
        $model = $this->selectById($id);

        return $model->update($attributes);
    }

    /**
     * Delete a row that corresponds to the ID.
     *
     * @param  int|string $id
     * @return bool
     */
    public function deleteById(int|string $id)
    {
        $model = $this->selectById($id);

        return $model->delete();
    }
}
