<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
// use OwenIt\Auditing\AuditingTrait;

class Registration extends Model
{
        
    // use AuditingTrait;
    
    //public $timestamps = false;
        
    protected $primaryKey = 'customer_id';
        
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'customer_info';
        
    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
            'full_name',
            'email',
            'mobile_no',
            'email_or_phone',
            'password',
            'gender',
            'date_of_birth',
            'profile_image',
            'pin_code',
            'forgotpassword_token',
            'is_verified',
            'fcm_id',
            'device_token',
            'imei'
        ];
        
    /**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [
            'password', 
            'pin_code',
            'forgotpassword_token',
            'created_at',
            'updated_at',
            'fcm_id',
            'device_token',
            'imei'
        ];
        
    /**
     * The password Hash before insert
     */
    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }

}
