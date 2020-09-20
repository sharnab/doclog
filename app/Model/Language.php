<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'languages';

    protected $guarded = ['id'];
    

    protected $hidden = [];
}