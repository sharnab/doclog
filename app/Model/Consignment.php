<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Consignment extends Model
{
    protected $table = 'customer_consignment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "contact_name",
        "total_bag",
        "seal_number",
        "courier_receipt_remarks",
        "courier_receipt_date",
        // "courier_receipt_time",
        "bank_date",
        // "bank_time",
        "bank_remarks",
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
