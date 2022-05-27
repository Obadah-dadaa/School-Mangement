<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Absence extends Model
{

    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $table='absences';
    protected $fillable = [
        'student_id', 'reason', 'date'
    ];

    public $timestamps = false;
    public $incrementing = true;

    public function setCreatedAtAttribute($value) {
        $this->attributes['created_at'] = Carbon::now();
    }

    public function setUpdatedAtAttribute($value) {
        $this->attributes['updated_at'] = Carbon::now();
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}

