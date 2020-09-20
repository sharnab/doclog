<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $table = 'airlines';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "type",
        "short_name",
        "code",
        "ticket_code",
        "commission",
        "email",
        "mobile",
        "address",
        "contact_person",
        "logo",
        "active_status",
        "remarks",
        "created_by",
        "updated_by"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
