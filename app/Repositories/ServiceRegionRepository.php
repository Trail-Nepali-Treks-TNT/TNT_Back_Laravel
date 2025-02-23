<?php

namespace App\Repositories;

use App\Models\Holidays\ServiceRegion;
use App\Repositories\Interface\IServiceRegionRepository;

class ServiceRegionRepository extends BaseRepository implements IServiceRegionRepository
{
    public function __construct(ServiceRegion $model)
    {
        parent::__construct($model);
    }
}