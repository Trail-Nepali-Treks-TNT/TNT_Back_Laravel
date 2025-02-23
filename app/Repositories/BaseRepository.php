<?php

namespace App\Repositories;

use App\Repositories\Interface\IBaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Exceptions\RepositoryException;
use Illuminate\Database\Eloquent\Collection;

class BaseRepository implements IBaseRepository
{
    protected $model;
    protected $query;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->query = $model->newQuery();
    }

    public function all(array $columns = ['*']): Collection
    {
        $cacheKey = $this->model->getTable() . '_all';
        return Cache::remember($cacheKey, 60, function () use ($columns) {
            return $this->query->get($columns);
        });
    }

    public function find(int $id, array $columns = ['*']): ?Model
    {
        return $this->model->find($id, $columns);
    }

    public function findOrFail(int $id, array $columns = ['*']): Model
    {
        $record = $this->find($id, $columns);
        if (!$record) {
            throw new RepositoryException("Record not found with id: $id");
        }
        return $record;
    }

    public function findWhere(array $where, array $columns = ['*']): Collection
    {
        return $this->query->where($where)->get($columns);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): Model
    {
        $record = $this->findOrFail($id);
        $record->update($data);
        return $record;
    }

    public function delete(int $id): bool
    {
        $record = $this->findOrFail($id);
        return $record->delete();
    }

    public function paginate(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator
    {
        return $this->model->paginate($perPage, $columns);
    }

    public function with(array $relations): self
    {
        $this->query = $this->model->with($relations);
        return $this;
    }
}
