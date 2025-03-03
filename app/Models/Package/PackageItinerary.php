<?php

namespace App\Models\Package;

use App\Models\Common\AuditableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageItinerary extends AuditableModel
{
    use HasFactory;
    protected $table = 'package_itineraries';

    protected $fillable = [
        'day',
        'name',
        'description',
        'latitude',
        'longitude',
        'package_details_id',
        'is_active',
        'is_deleted',
    ];
}