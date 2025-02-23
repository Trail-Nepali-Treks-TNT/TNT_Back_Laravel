<?php
namespace App\Repositories\Interface;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface IUserRepository extends IBaseRepository
{
    public function findByEmail(string $email): ?User;
    public function getActiveUsers(): Collection;
}