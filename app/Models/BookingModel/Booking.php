<?php

namespace App\Models\BookingModel;

use App\Models\Common\AuditableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends AuditableModel
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'is_active',
        'is_deleted',
        'package_id',
        'full_name',
        'email',
        'phone',
        'travel_date',
        'guests',
        'message',
        'package_name',
    ];
}
