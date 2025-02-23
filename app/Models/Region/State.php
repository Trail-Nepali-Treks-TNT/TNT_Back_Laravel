<?php

namespace App\Models\Region;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $incrementing = true;  // Enable auto-increment
    protected $keyType = 'int';   // Set key type to integer
    protected $fillable = [
        'name',
        'code',
        'latitude',
        'longitude',
        'type',
        'country_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function city()
    {
        return $this->hasMany(City::class);
    }
}
