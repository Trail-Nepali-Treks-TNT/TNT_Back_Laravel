<?php

namespace App\Repositories;

use App\Models\Package\PackageAccomodation;
use App\Repositories\Interface\IPackageAccomodationRepository;

class PackageAccomodationRepository extends BaseRepository implements IPackageAccomodationRepository
{
    public function __construct(PackageAccomodation $model)
    {
        parent::__construct($model);
    }
}