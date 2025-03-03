<?php

namespace App\Repositories\Interface;

interface IPackageDetailRepository extends IBaseRepository
{
    public function getDetail($id);
    public function updateAccomodation($id, $newAccommodations);
}
