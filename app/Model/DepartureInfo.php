<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class DepartureInfo extends Model
{
    protected $table = 'expat_travel_history';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "expat_id",
        "travel_type",
        "departure_country_id",
        "date",
        "iata_code",
        "active_status",
        "created_by",
        "updated_by"
    ];

    public function expat()
    {
        return $this->belongsTo('App\Model\Expat', 'expat_id')->select('*');
    }

}
