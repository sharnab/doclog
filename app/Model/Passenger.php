<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $table = 'passenger';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "sur_name",
        "given_name",
        "customer_id",
        "customer_relation",
        "contact_no",
        "personal_no",
        "nationality",
        "email",
        "gender",
        "place_of_birth",
        "date_of_birth",
        "passport_no",
        "passport_image",
        "date_of_issue",
        "date_of_expire",
        "issuing_authority",
        "driver_license_no",
        "previous_passport_no",
        "previous_passport_image",
        "nid_img",
        "driver_license_img",
        "emergency_name",
        "emergency_contact",
        "emergency_relation",
        "emergency_address",
        "billing_address",
        "sales_executive_id",
        "rating",
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
     public function customer()
     {
         return $this->belongsTo('App\Model\Customer', 'customer_id')->select('id','given_name');
     }

}
