<?php

namespace App\Models\Region;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $incrementing = true;  // Enable auto-increment
    protected $keyType = 'int';   // Set key type to integer
    protected $fillable = [
        'name',
        'alpha2Code',
        'alpha3Code',
        'dialCode',
        'currency',
        'currencySymbol',
    ];

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
