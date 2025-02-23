<?php

namespace App\Repositories;

use App\Models\Master\Category;
use App\Repositories\Interface\ICategoryRepository;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
}