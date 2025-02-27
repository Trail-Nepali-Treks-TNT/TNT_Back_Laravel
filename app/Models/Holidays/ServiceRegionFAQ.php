<?php

namespace App\Models\Holidays;

use App\Models\Common\AuditableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceRegionFAQ extends AuditableModel
{
    use HasFactory;

    protected $table = 'service_region_faq';

    protected $fillable = [
        'is_active',
        'is_deleted',
        'question',
        'answer',
        'service_region_id'
    ];
    
    public function serviceRegion()
    {
        return $this->belongsTo(ServiceRegion::class);
    }
}
