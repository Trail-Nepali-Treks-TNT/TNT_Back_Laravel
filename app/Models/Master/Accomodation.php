<?php

namespace App\Models\Master;

use App\Models\Common\AuditableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accomodation extends AuditableModel
{
    use HasFactory;

    protected $table = 'accomodation';

    protected $fillable = [
        'is_active',
        'is_deleted',
        'name',
        'description',
    ];
}