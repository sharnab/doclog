<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class ExpatMotherCompany extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expat_mother_company';

   // protected $guarded = ['id'];
    protected $guarded = ['id'];

}
