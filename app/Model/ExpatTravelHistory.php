<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class ExpatTravelHistory extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expat_travel_history';

   // protected $guarded = ['id'];
    protected $guarded = ['id'];

}
