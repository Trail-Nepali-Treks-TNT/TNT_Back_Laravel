<?php

namespace App\Models\Common;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class BaseModel extends Model
{
    public $incrementing = true;  // Enable auto-increment
    protected $keyType = 'int';   // Set key type to integer

    // Common casting for audit fields
    protected $casts = [
        'is_active'    => 'boolean',
        'is_deleted'   => 'boolean',
        'created_at' => 'datetime',
        'updated_at'   => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (Auth::check() && empty($model->created_by)) {
                $model->created_by = Auth::user()->id; // Set created_by
            }
        });

        static::updating(function ($model) {
            if (Auth::check()) {
                $model->updated_by = Auth::user()->id;  // Set updated_by
            }
        });
    }

    public function creator()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(\App\Models\User::class, 'updated_by');
    }
}
