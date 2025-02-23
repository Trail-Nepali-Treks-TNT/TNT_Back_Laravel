<?php

namespace App\Models\Media;

use App\Models\Common\AuditableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FileMapping extends AuditableModel
{
    use HasFactory;

    protected $table = 'file_mapping';

    protected $fillable = [
        'is_active',
        'is_deleted',
        'file_detail_id',
        'target_id',
    ];    
    //
}
