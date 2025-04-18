<?php

namespace App\Models\Package;

use App\Models\Common\AuditableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageDetail extends AuditableModel
{
    use HasFactory;

    protected $table = 'package_details';

    protected $fillable = [
        'is_active',
        'is_deleted',
        'name',
        'short_description',
        'description',
        'price',
        'old_price',
        'duration',
        'walking_per_day',
        'group_size',
        'starting_point',
        'availability',
        'total_distance',
        'max_elevation',
        'best_seller',
        'popular',
        'slugURL',
        'category_id', // Adventure,Tours and others
        'difficulty_level_id', // Moderate and oters
        'service_region_id', //Regions or others
    ];

    public function accomodation()
    {
        return $this->belongsToMany(PackageAccomodation::class, 'package_accomodations', 'package_details_id', 'accomodation_id')
            ->withTimestamps();
    }
}
