<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepoInterface
{
    public function all(): Collection;
    public function find(int|string $id,bool $findOrFail = true): ?Model;
    public function findBy(string $column,int|string $value, bool $findOrFail = true): ?Model;
    public function create(array $data): Model;
    public function update(array $data,int|string $id): bool;
    public function delete(int|string $id): bool;
    public function exists(string $column,int|string $value): bool;
}
