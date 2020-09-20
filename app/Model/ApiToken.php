<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ApiToken extends Model
{
    protected $table = 'api_token';

    protected $primaryKey = 'token_id' ;

    protected $fillable = [
    		'token',
            'customer_id',
            'created_at',
            'updated_at',
    	];

}
