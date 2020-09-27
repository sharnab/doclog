<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class ExpatBdAddress extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expat_bd_address';

   // protected $guarded = ['id'];
    protected $guarded = ['id'];

}
