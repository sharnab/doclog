<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class ExpatWorkPlace extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expat_work_place';

   // protected $guarded = ['id'];
    protected $guarded = ['id'];

}
