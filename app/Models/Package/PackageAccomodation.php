<?php

namespace App\Models\Package;

use App\Models\Common\AuditableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageAccomodation extends AuditableModel
{
    use HasFactory;
    protected $table = 'package_accomodation';

    protected $fillable = [
        'is_active',
        'is_deleted',
        'package_details_id',
        'accomodation_id',
    ];
    
    public function packages()
    {
        return $this->belongsToMany(PackageDetail::class, 'package_accomodation', 'accomodation_id', 'package_details_id')
            ->withTimestamps();
    }
}
