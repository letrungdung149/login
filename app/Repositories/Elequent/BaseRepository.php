<?php

namespace App\Repositories\Elequent;

use App\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }
    public function find(array $conditions = [])
    {
        // TODO: Implement find() method.
    }
    public function findOne(array $conditions)
    {
        // TODO: Implement findOne() method.
    }
    public function findById(int $id)
    {
        // TODO: Implement findById() method.
    }
    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }
    public function update(Model $model, array $attributes = [])
    {
        // TODO: Implement update() method.
    }
    public function save(Model $model)
    {
        // TODO: Implement save() method.
    }
    public function delete(Model $model)
    {
        // TODO: Implement delete() method.
    }
}
