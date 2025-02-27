<?php

namespace App\Repositories;

use App\Models\Holidays\ServiceRegionFAQ;
use App\Repositories\Interface\IServiceRegionFAQRepository;

class ServiceRegionFAQRepository extends BaseRepository implements IServiceRegionFAQRepository
{
    public function __construct(ServiceRegionFAQ $model)
    {
        parent::__construct($model);
    }
}