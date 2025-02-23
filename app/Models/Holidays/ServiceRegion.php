<?php

namespace App\Models\Holidays;

use App\Models\Common\AuditableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceRegion extends AuditableModel
{
    use HasFactory;

    protected $table = 'service_regions';

    protected $fillable = [
        'is_active',
        'is_deleted',
        'name',
        'description',
        'reason',
        'service_type_id',
        'banner_file_detail_id',
        'dahboard_file_detail_id',
    ];
}
