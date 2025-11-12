<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepoInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepo implements BaseRepoInterface
{
    protected Model $model;

    public function all(): Collection
    {
        return $this->model::query()->get();
    }

    public function create(array $data): Model
    {
        return $this->model::query()->create($data);
    }

    public function find(int|string $id, bool $findOrFail = true): ?Model
    {
        $query = $this->model::query();
        return $findOrFail ? $query->findOrFail($id) : $query->find($id);
    }

    public function findBy(string $column,int|string $value, bool $findOrFail = true): ?Model
    {
        $query = $this->model::query()->where($column,$value);
        return $findOrFail ? $query->firstOrFail() : $query->first($value);
    }

    public function update(array $data, int|string $id): bool
    {
        return $this->find($id)->update($data);
    }

    public function delete(int|string $id): bool
    {
        return $this->find($id)->delete();
    }

    public function exists(string $column, int|string $value): bool
    {
        return $this->model::query()->where($column,$value)->exists();
    }
}
