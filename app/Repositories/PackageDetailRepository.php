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
        $detail->package_accommodation = PackageAccomodation::where('package_details_id', $id)
            ->where('is_deleted', false)
            ->get();
        return $detail;
    }
    
    public function updateAccomodation($id, $newAccommodations)
    {
        $existingAccommodations = PackageAccomodation::where('package_details_id', $id)->get();
        $existingAccommodationIds = $existingAccommodations->pluck('accomodation_id')->toArray();
        $removedAccommodations = array_diff($existingAccommodationIds, $newAccommodations);
        if (!empty($removedAccommodations)) {
            PackageAccomodation::where('package_details_id', $id)
                ->whereIn('accomodation_id', $removedAccommodations)
                ->update(['is_deleted' => true]);
        }
        foreach ($newAccommodations as $accommodationId) {
            $existing = PackageAccomodation::where('package_details_id', $id)
                ->where('accomodation_id', $accommodationId)
                ->first();

            if ($existing) {
                if ($existing->is_deleted) {
                    $existing->update(['is_deleted' => false]);
                }
            } else {
                PackageAccomodation::create([
                    'package_details_id' => $id,
                    'accomodation_id' => $accommodationId,
                    'is_deleted' => false
                ]);
            }
        }
    }
}
