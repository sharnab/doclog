<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class SmsGateway extends Model
{
    protected $table = 'sms_gateway_config';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "url",
        "username",
        "password_text",
        "active_status",
        "created_by",
        "updated_by",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
