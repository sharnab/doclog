<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class ExpatBdBankAccount extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expat_bd_bank_account';

   // protected $guarded = ['id'];
    protected $guarded = ['id'];

}
