<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class RemmittanceHistory extends Model
{
    protected $table = 'expat_remittance_history';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "expat_id",
        "amount",
        "currency_id",
        "transfer_mode",
        "reference_no",
        "transfer_date",
        "active_status",
        "created_by",
        "updated_by"
    ];

    public function expat()
    {
        return $this->belongsTo('App\Model\Expat', 'expat_id')->select('*');
    }

}
