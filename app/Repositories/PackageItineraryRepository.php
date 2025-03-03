<?php

namespace App\Repositories;

use App\Models\Package\PackageItinerary;
use App\Repositories\Interface\IPackageItineraryRepository;

class PackageItineraryRepository extends BaseRepository implements IPackageItineraryRepository
{
    public function __construct(PackageItinerary $model)
    {
        parent::__construct($model);
    }
}