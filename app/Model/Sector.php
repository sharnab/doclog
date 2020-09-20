<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = "sectors";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "type",
        "departure_airport",
        "departure_country_id",
        "arrival_airport",
        "arrival_country_id",
        "active_status",
        "created_by",
        "updated_by"
    ];

}
