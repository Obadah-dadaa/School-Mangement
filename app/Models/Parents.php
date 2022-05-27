<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class Parents extends Authenticatable
{

    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $table='parents';
    protected $guard='parent';

    protected $fillable = [
        'name', 'email', 'address', 'password', 'phone_number'
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

    public function consults(){
        return $this->hasMany(Consult::class, 'parent_id', 'id');
    }

    public function financialFees(){
        return $this->hasMany(FinancialFee::class, 'parent_id', 'id');
    }

    public function payments(){
        return $this->hasMany(Payment::class, 'parent_id', 'id');
    }

    public function student()
    {
        return $this->hasMany(Student::class, 'parent_id', 'id');
    }
}

