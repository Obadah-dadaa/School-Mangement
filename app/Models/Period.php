<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Period extends Model
{

    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $table='periods';
    protected $fillable = [
        'start', 'end'
    ];

    protected $hidden = [

    ];

    public $timestamps = false;
    public $incrementing = true;

    public function setCreatedAtAttribute($value) {
        $this->attributes['created_at'] = Carbon::now();
    }

    public function setUpdatedAtAttribute($value) {
        $this->attributes['updated_at'] = Carbon::now();
    }

    public function schedules(){
        return $this->hasMany(Schedule::class, 'period_id', 'id');
    }

}

