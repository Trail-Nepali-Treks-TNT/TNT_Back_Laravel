<?php

namespace App\Models\Package;

use App\Models\Common\AuditableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageInclusion extends AuditableModel
{
    use HasFactory;
    protected $table = 'package_inclusions';

    protected $fillable = [
        'name',
        'description',
        'is_included',
        'package_details_id',
        'is_active',
        'is_deleted',
    ];
}