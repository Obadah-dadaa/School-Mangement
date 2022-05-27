<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SectionsGrade extends Model
{

    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $table='sectionsgrades';

    protected $fillable = [
        'section_id', 'grade_id',
    ];

    protected $hidden = [

    ];

    public $timestamps = false;
    public $incrementing = false;

    public function setCreatedAtAttribute($value) {
        $this->attributes['created_at'] = Carbon::now();
    }

    public function setUpdatedAtAttribute($value) {
        $this->attributes['updated_at'] = Carbon::now();
    }

    public function section(){
        return $this->hasOne(Section::class, 'id', 'section_id');
    }

    public function grade(){
        return $this->hasOne(Grade::class, 'id', 'grade_id');
    }
}

