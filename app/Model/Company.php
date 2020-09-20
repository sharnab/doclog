<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "short_name",
        "address",
        "active_status",
        "created_by",
        "updated_by"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     public function Customer()
     {
         return $this->belongsTo('App\Model\Customer', 'reference_id')->select('id','given_name');
     }
}
