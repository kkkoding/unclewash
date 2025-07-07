<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class Partner extends Model
{
    use HasApiTokens;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name', 'phone', 'is_active', 'current_lat', 'current_lng',
        'total_fee_today', 'unpaid_fee', 'is_blocked', 'admin_id'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}

