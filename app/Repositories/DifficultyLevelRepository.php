<?php

namespace App\Repositories;

use App\Models\Master\DifficultyLevel;
use App\Repositories\Interface\IDifficultyLevelRepository;

class DifficultyLevelRepository extends BaseRepository implements IDifficultyLevelRepository
{
    public function __construct(DifficultyLevel $model)
    {
        parent::__construct($model);
    }
}