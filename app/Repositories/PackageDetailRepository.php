<?php

namespace App\Repositories;

use App\Models\Package\PackageAccomodation;
use App\Models\Package\PackageDetail;
use App\Repositories\Interface\IPackageDetailRepository;
use Illuminate\Support\Facades\DB;

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

    public function packageDetail($id)
    {
        $package = DB::select("SELECT 
                                    package_details.*,
                                    category.name AS category_name,
                                    difficulty_levels.name AS difficulty_name,
                                    service_regions.name AS region_name,
                                    GROUP_CONCAT(accomodation.name SEPARATOR ', ') AS accomodation_names
                                FROM package_details
                                INNER JOIN package_accomodations ON package_details.id = package_accomodations.package_details_id
                                INNER JOIN accomodation ON package_accomodations.accomodation_id = accomodation.id
                                INNER JOIN category ON package_details.category_id = category.id
                                INNER JOIN difficulty_levels ON package_details.difficulty_level_id = difficulty_levels.id
                                INNER JOIN service_regions ON package_details.service_region_id = service_regions.id
                                WHERE package_details.is_deleted = 0
                                AND package_details.is_active = 1 AND package_details.id={$id}
                                GROUP BY package_details.id;");

        $package = $package[0] ?? null;
        if ($package) {
            $package = (array) $package;

            $package['itineraries'] = DB::select("SELECT day,name,description,latitude,longitude 
                                FROM package_itineraries WHERE is_deleted = 0 AND is_active = 1 AND package_details_id = {$id}");

            $package['faqs'] = DB::select("SELECT question,answer 
                                FROM package_faqs WHERE is_deleted = 0 AND is_active = 1 AND package_details_id = {$id}");

            $package['included'] = DB::select("SELECT name,description 
                                FROM package_inclusions WHERE is_included = 1 AND is_deleted = 0 AND is_active = 1 AND package_details_id = {$id}");

            $package['not_included'] = DB::select("SELECT name,description 
                                FROM package_inclusions WHERE is_included = 0 AND is_deleted = 0 AND is_active = 1 AND package_details_id = {$id}");

            $package['images'] = DB::select("SELECT file_details.file_url,file_details.content_type,file_details.original_name FROM file_mapping 
                                INNER JOIN file_details ON file_mapping.file_details_id = file_details.id
                                WHERE file_mapping.is_deleted = 0 AND file_mapping.is_active = 1
                                AND file_details.is_deleted = 0 AND file_details.is_active = 1 AND file_mapping.table = 'Package'
                                AND file_mapping.target_id = {$id}");
        }
        return $package;
    }

    public function packageList()
    {
        $packages = DB::select("   SELECT * 
        FROM package_details WHERE is_deleted = 0 AND is_active = 1 LIMIT 8;");
        $packageIds = collect($packages)->pluck('id')->toArray();
        $images = DB::select("
                        SELECT 
                            file_mapping.target_id AS package_id,
                            file_details.file_url,
                            file_details.content_type,
                            file_details.original_name
                        FROM file_mapping
                        INNER JOIN file_details ON file_mapping.file_details_id = file_details.id
                        WHERE file_mapping.is_deleted = 0 
                            AND file_mapping.is_active = 1
                            AND file_details.is_deleted = 0 
                            AND file_details.is_active = 1 
                            AND file_mapping.table = 'Package'
                            AND file_mapping.target_id IN (" . implode(',', $packageIds) . ")
                    ");

        $imagesGrouped = collect($images)->groupBy('package_id')->map(function ($group) {
            return $group->pluck('file_url')->values(); // Just get the URLs
        });

        $packagesWithImages = collect($packages)->map(function ($package) use ($imagesGrouped) {
            $package->images = $imagesGrouped[$package->id] ?? [];
            return $package;
        });
        return $packagesWithImages;
    }
}
