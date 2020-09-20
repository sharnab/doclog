<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class SmsContent extends Model
{
    protected $table = 'sms_content';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "title",
        "content",
        "sms_type",
        "description",
        "remarks",
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
