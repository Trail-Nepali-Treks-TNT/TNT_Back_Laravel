<?php

namespace App\Repositories;

use App\Models\Package\PackageDetail;
use App\Repositories\Interface\IPackageDetailRepository;

class PackageDetailRepository extends BaseRepository implements IPackageDetailRepository
{
    public function __construct(PackageDetail $model)
    {
        parent::__construct($model);
    }
}