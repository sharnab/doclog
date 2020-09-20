<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_company' ;
    
    public $timestamps = false ;
    
    protected $primaryKey = 'user_company_id' ;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
    	'company_id',
    	'created_by',
    ];


}
