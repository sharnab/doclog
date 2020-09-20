<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SMSLog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sms_log' ;
    
    protected $primaryKey = 'sms_log_id' ;

    public $timestamps = false ;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'touser_id',
    	'mobile_no',
    	'message',
        'send_time',
    	'sms_type',
    	'status',
    ];

}
