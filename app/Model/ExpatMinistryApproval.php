<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class ExpatMinistryApproval extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expat_ministry_approval';

   // protected $guarded = ['id'];
    protected $guarded = ['id'];

}
