<?php

namespace App\Repositories;

use App\Models\Package\PackageInclusion;
use App\Repositories\Interface\IPackageInclusionRepository;

class PackageInclusionRepository extends BaseRepository implements IPackageInclusionRepository
{
    public function __construct(PackageInclusion $model)
    {
        parent::__construct($model);
    }
}