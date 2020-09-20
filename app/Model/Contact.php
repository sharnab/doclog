<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'passenger_contact_list';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "passenger_id",
        "contact_no",
        "created_by",
        "updated_by"
    ];

}
