<?php

namespace App\Repositories;

use App\Models\Package\PackageFAQ;
use App\Repositories\Interface\IPackageFaqRepository;

class PackageFaqRepository extends BaseRepository implements IPackageFaqRepository
{
    public function __construct(PackageFAQ $model)
    {
        parent::__construct($model);
    }
}
