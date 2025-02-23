<?php

namespace App\Models\Region;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $incrementing = true;  // Enable auto-increment
    protected $keyType = 'int';   // Set key type to integer
    protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'state_id',
    ];
    
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
