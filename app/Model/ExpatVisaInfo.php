<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ExpatVisaInfo extends Model
{
    protected $table = "expat_visa_info";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "passenger_id",
        "visa_number",
        "country_id",
        "issue_date",
        "expiry_date",
        "visa_type",
        "attachment",
        "active_status",
        "created_by",
        "updated_by",
    ];

    public function country()
    {
        return $this->belongsTo('App\Model\Country', 'country_id')->select('id','name');
    }

    public function passenger()
    {
        return $this->belongsTo('App\Model\Passenger', 'passenger_id')->select('id','given_name', 'contact_no');
    }

}
