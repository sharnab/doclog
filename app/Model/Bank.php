<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "active_status",
        "created_by",
        "updated_by"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
