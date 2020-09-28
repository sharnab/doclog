<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "type",
        "company_id",
        "sur_name",
        "given_name",
        "customer_type_id",
        "contact_no",
        "personal_no",
        "nationality",
        "gender",
        "religion_id",
        "place_of_birth",
        "date_of_birth",
        "passport_no",
        "passport_image",
        "date_of_issue",
        "date_of_expire",
        "issuing_authority",
        "previous_passport_no",
        "emergency_name",
        "emergency_contact",
        "emergency_relation",
        "emergency_address",
        "billing_address",
        "sales_executive_id",
        "created_by",
        "updated_by"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $remember_token=false;

    public function customerType()
    {
        return $this->belongsTo('App\Model\CustomerType', 'customer_type_id')->select('id','name');
    }
}
