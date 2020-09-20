<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class salesExecutive extends Model
{
    protected $table = 'sales_executives';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "email",
        "mobile",
        "address",
        "image",
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
