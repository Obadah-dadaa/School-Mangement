<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TeachersSubject extends Model
{

    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $table='teachers_sections';
    protected $fillable = [
        'teacher_id', 'subject_id'
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

    public function teacher(){
        return $this->hasOne(Teacher::class, 'id', 'teacher_id');
    }

    public function subject(){
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }
}

