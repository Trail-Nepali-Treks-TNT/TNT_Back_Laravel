<?php

namespace App\Repositories;

use App\Models\Holidays\ServiceRegion;
use App\Repositories\Interface\IServiceRegionRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class ServiceRegionRepository extends BaseRepository implements IServiceRegionRepository
{
    public function __construct(ServiceRegion $model)
    {
        parent::__construct($model);
    }

    public function getNavigationItems()
    {
        return Cache::rememberForever('navigation_items', function () {
            return DB::select("SELECT 
                        sr.Id AS region_id, 
                        st.name AS category, 
                        sr.name AS region_name,
                        dfd.file_url AS dashboard_file_path
                    FROM service_types st
                    JOIN service_regions sr ON st.id = sr.service_type_id
                    LEFT JOIN file_details bfd ON sr.banner_file_detail_id = bfd.id
                    LEFT JOIN file_details dfd ON sr.dahboard_file_detail_id = dfd.id
                    WHERE sr.is_active = 1 AND sr.is_deleted = 0;");
        });
    }

    public function regonPackageItems()
    {
        return Cache::rememberForever('region_PackageItems', function () {
            return DB::select("SELECT 
                                    sr.Id AS region_id, 
                                    sr.name AS region_name,
                                    dfd.file_url AS dashboard_file_path,
                                    COUNT(pkg.id) AS package_count
                                FROM service_regions sr
                                LEFT JOIN package_details pkg ON sr.Id = pkg.service_region_id 
                                    AND pkg.is_active = 1 
                                    AND pkg.is_deleted = 0
                                LEFT JOIN file_details bfd ON sr.banner_file_detail_id = bfd.id
                                LEFT JOIN file_details dfd ON sr.dahboard_file_detail_id = dfd.id
                                WHERE sr.is_active = 1 AND sr.is_deleted = 0
                                GROUP BY sr.Id, sr.name, bfd.file_url, dfd.file_url;");
        });
    }
    public function RegionDetail($id)
    {
        $region = DB::selectOne("
                    SELECT sr.id,sr.name,sr.description,sr.reason, fd.file_url AS dashboard_file_url 
                    FROM service_regions sr JOIN file_details fd ON sr.dahboard_file_detail_id = fd.id
                    WHERE sr.id = ?
                    LIMIT 1
                ", [$id]);
        if (!$region) {
            return null;
        }
        $region = (array) $region;
        $region['faqs'] = DB::select("SELECT question,answer 
                                FROM service_region_faq WHERE is_deleted = 0 AND is_active = 1 AND service_region_id = {$id}");
        return $region;
    }
}
