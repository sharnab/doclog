<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class ExpatWorkPermit extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expat_work_permit';

   // protected $guarded = ['id'];
    protected $guarded = ['id'];

}
