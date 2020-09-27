<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class ExpatBmetInfo extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expat_bmet_info';

   // protected $guarded = ['id'];
    protected $guarded = ['id'];

}
