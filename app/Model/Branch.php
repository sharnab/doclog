<?php

namespace App\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branch';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "address",
        "bank_id",
        "routing_no",
        "contact_no",
        "active_status",
        "created_by",
        "updated_by"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     public function bank()
     {
         return $this->belongsTo('App\Model\Bank', 'bank_id')->select('id','name');
     }

     public static function getBranchesByBank($branch_id=0){

     $value=DB::table('branch')->where('bank_id', $branch_id)->get();

     return $value;
   }

}
