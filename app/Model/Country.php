<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $guarded = ['id'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     "title",
    //     "title_bn",
    //     "code",
    //     "display_sequence",
    //     //"view_priority",
    //     //"is_default",
    //     "active_status",
    //     "created_by",
    //     "updated_by"
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
