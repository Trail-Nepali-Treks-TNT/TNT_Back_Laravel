<?php

namespace App\Models\Media;

use App\Models\Common\AuditableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FileDetail extends AuditableModel
{
    use HasFactory;

    protected $table = 'file_details';

    protected $fillable = [
        'is_active',
        'is_deleted',
        'file_url',
        'original_name',
        'content_type',
        'file_name'
    ];    
}
