<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class Teacher extends Authenticatable
{

    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $table='teachers';
    protected $guard='teacher';

    protected $fillable = [
        'name', 'email', 'password', 'phone_number'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $timestamps = false;
    public $incrementing = true;

    public function setCreatedAtAttribute($value) {
        $this->attributes['created_at'] = Carbon::now();
    }
    public function setUpdatedAtAttribute($value) {
        $this->attributes['updated_at'] = Carbon::now();
    }
    public function section(){
        return $this->belongsToMany(Section::class, 'teacherssections', 'teacher_id', 'section_id');
    }
    public function subject(){
            return $this->belongsToMany(Subject::class, 'teacher_subjects', 'teacher_id', 'subject_id');
    }
    public function teachersSubjects(){
        return $this->hasMany(TeachersSubject::class, 'teacher_id', 'id');
    }

}

