<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class EloquentRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(array $columns = ['*'])
    {
        return $this->model->all($columns);
    }

    public function count(): int
    {
        return $this->model->count();
    }

    public function paginate(int $perpage = 25)
    {
        return $this->model->paginate($perpage);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->model->destroy($id);
    }

    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function search(string $column, mixed $value)
    {
        return $this->model->where($column, 'LIKE', "%$value%")->get();
    }
}
