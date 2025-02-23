<?php

namespace App\Repositories;

use App\Models\Master\ServiceType;
use App\Repositories\Interface\IServiceTypeRepository;

class ServiceTypeRepository extends BaseRepository implements IServiceTypeRepository
{
    public function __construct(ServiceType $model)
    {
        parent::__construct($model);
    }
}