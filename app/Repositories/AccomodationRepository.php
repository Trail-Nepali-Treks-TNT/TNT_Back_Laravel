<?php

namespace App\Repositories;

use App\Models\Master\Accomodation;
use App\Repositories\Interface\IAccomodationRepository;

class AccomodationRepository extends BaseRepository implements IAccomodationRepository
{
    public function __construct(Accomodation $model)
    {
        parent::__construct($model);
    }
}