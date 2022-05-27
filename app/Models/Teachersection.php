<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Teachersection extends Model
{
    use HasFactory;
    protected $table='teacherssections';
    protected $fillable= [
        'teacher_id',
        'section_id'
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

    public function section(){
        return $this->hasOne(Section::class, 'id', 'subject_id');
    }
}
