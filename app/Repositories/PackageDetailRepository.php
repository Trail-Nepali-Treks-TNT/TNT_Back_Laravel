<?php

namespace App\Repositories;

use App\Models\Package\PackageAccomodation;
use App\Models\Package\PackageDetail;
use App\Repositories\Interface\IPackageDetailRepository;

class PackageDetailRepository extends BaseRepository implements IPackageDetailRepository
{
    protected $model;
    public function __construct(PackageDetail $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }

    public function getDetail($id)
    {
        $detail = $this->model->find($id);
        $detail->package_accommodation = PackageAccomodation::all()->where('package_details_id', '=', $detail['id']);
        return $detail;
    }
}
