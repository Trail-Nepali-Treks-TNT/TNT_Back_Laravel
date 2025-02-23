<?php

namespace App\Models\Master;

use App\Models\Common\AuditableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceType extends AuditableModel
{
    use HasFactory;

    protected $table = 'service_types';

    protected $fillable = [
        'is_active',
        'is_deleted',
        'name',
        'description',
    ];

    // use this when other fields needs to be audited as well
    // protected $casts = [
    //     ...parent::$casts,  // Keep the base model's castings
    //     'extra_field' => 'json',  // Add additional casting
    // ];
}
