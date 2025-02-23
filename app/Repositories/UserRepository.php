<?php

namespace App\Repositories;
use App\Repositories\Interface\IUserRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends BaseRepository implements IUserRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->model->where('email', $email)->first();
    }

    public function getActiveUsers(): Collection
    {
        return $this->model->where('is_active', true)->get();
    }
}