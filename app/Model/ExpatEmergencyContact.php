<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class ExpatEmergencyContact extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expat_emergency_contact';

   // protected $guarded = ['id'];
    protected $guarded = ['id'];

}
