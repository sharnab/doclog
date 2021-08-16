<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $table = 'specialities';
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
