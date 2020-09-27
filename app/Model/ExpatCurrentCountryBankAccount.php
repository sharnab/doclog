<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class ExpatCurrentCountryBankAccount extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expat_current_country_bank_account';

   // protected $guarded = ['id'];
    protected $guarded = ['id'];

}
