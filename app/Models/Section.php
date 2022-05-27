<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Section extends Model
{

    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $table='sections';
    protected $fillable = [
        'number'
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

    public function grade()
    {
        return $this->belongsToMany(Grade::class, 'sectionsgrades', 'grade_id', 'section_id');
    }
    public function teacher()
    {
        return $this->belongsToMany(Teacher::class, 'teacherssections', 'teacher_id', 'section_id');
    }
    public function schedules(){
        return $this->hasMany(Schedule::class, 'section_id', 'id');
    }
    public function sectionsgrades(){
        return $this->hasMany(Sectionsgrade::class, 'grade_id', 'id');
    }
}

