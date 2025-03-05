<?php

namespace App\Models\Package;

use App\Models\Common\AuditableModel;
use App\Models\Package\PackageDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageFAQ extends AuditableModel
{
    use HasFactory;

    protected $table = 'package_faqs';

    protected $fillable = [
        'is_active',
        'is_deleted',
        'question',
        'answer',
        'package_details_id'
    ];
    
    public function package()
    {
        return $this->belongsTo(PackageDetail::class);
    }
}