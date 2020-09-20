<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class VisaProcessing extends Model
{
    protected $table = 'visa_processing';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "passenger_id",
        "issue_date",
        "acceptance_date",
        "return_date",
        "agency_id",
        "visa_fee",
        "processing_fee",
        "bank_fee",
        "service_charge",
        "discount",
        "total",
        "created_by",
        "updated_by"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     public function passenger()
     {
         return $this->belongsTo('App\Model\Passenger', 'passenger_id')->select('id','given_name', 'contact_no');
     }
     public function Agency()
     {
         return $this->belongsTo('App\Model\Agency', 'agency_id')->select('id','name');
     }

}
