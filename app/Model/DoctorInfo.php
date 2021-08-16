<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class DoctorInfo extends Model
{
    protected $table = 'doctor_infos';
    protected $guarded = ['id'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
