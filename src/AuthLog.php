<?php

namespace Nksquare\AuthLog;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AuthLog extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'credentials' => 'array',
    ];
    
    public function authenticable()
    {
        return $this->morphTo();
    }

    public function scopeNewest($query)
    {
        $query->orderBy('auth_at','desc');
    }

    public static function make()
    {
        $authLog = new static();
        $authLog->ip_address = config('authlog.save_ip') ? request()->ip() : null;
        $authLog->auth_at = Carbon::now();
        return $authLog;
    }
}