<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table='subjects';
    protected $fillable= [
        'name','grade_id',
        ];

    public function teacher()
    {
            return $this->belongsToMany(Teacher::class, 'teacher_subjects', 'teacher_id', 'subject_id');
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
}
