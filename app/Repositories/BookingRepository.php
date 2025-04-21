<?php

namespace App\Repositories;

use App\Models\BookingModel\Booking;
use App\Repositories\Interface\IBookingRepository;

class BookingRepository extends BaseRepository implements IBookingRepository
{
    public function __construct(Booking $model)
    {
        parent::__construct($model);
    }
}