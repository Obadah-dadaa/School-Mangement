<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;;
class SubjectsGrade extends Model
{
    use HasFactory;
    protected $table='subjectssgrades';
    protected $fillable= [
        'subject_id',
        'grade_id'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public function setCreatedAtAttribute($value) {
        $this->attributes['created_at'] = Carbon::now();
    }

    public function setUpdatedAtAttribute($value) {
        $this->attributes['updated_at'] = Carbon::now();
    }

    public function subject(){
        return $this->hasOne(Teacher::class, 'id', 'subject_id');
    }

    public function grade_(){
        return $this->hasOne(Section::class, 'id', 'grade_id');
    }
}
