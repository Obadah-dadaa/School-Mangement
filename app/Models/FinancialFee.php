<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class FinancialFee extends Model
{

    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $table='financialfees';
    protected $fillable = [
        'student_id', 'parent_id', 'fees', 'discounts', 'date'
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

    public function student(){
        return $this->hasOne(Student::class, 'id', 'student_id');
    }

    public function parent(){
        return $this->hasOne(Parent::class, 'id', 'parent_id');
    }

}

