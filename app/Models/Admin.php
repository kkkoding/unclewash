<<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
{
    use HasApiTokens;
    
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name', 'email', 'password', 'location_lat', 'location_lng', 'active'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}

