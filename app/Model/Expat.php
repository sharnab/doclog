<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class Expat extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expat';

   // protected $guarded = ['id'];
    protected $guarded = ['id'];

}
