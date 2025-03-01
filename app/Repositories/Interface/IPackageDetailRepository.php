<?php

namespace App\Repositories\Interface;

interface IPackageDetailRepository extends IBaseRepository
{
    public function getDetail($id);
}
