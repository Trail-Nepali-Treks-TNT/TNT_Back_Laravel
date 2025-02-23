<?php

namespace App\Repositories\Interface;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface IBaseRepository
{
    public function all(array $columns = ['*']): Collection;
    public function find(int $id, array $columns = ['*']): ?Model;
    public function findOrFail(int $id, array $columns = ['*']): Model;
    public function findWhere(array $where, array $columns = ['*']): Collection;
    public function create(array $data): Model;
    public function update(int $id, array $data): Model;
    public function delete(int $id): bool;
    public function paginate(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator;
    public function with(array $relations): self;
}
