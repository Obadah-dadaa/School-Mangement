<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Schedule extends Model
{

    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $fillable = [
        'section_id', 'subject_id', 'period_id', 'day'
    ];

    protected $hidden = [

    ];

    public $timestamps = false;
    public $incrementing = true;

    protected $table='schedules';
    public function setCreatedAtAttribute($value) {
        $this->attributes['created_at'] = Carbon::now();
    }

    public function setUpdatedAtAttribute($value) {
        $this->attributes['updated_at'] = Carbon::now();
    }

    public function section(){
        return $this->hasOne(Sectionsgrade::class, 'id', 'section_id');
    }

    public function subject(){
        return $this->hasOne(Subjectsgrade::class, 'id', 'subject_id');
    }

    public function period(){
        return $this->hasOne(Period::class, 'id', 'period_id');
    }

}

