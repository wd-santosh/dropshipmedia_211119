<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class delivery_day_model extends Model
{
     protected $fillable = [
        //'delivery_day',        
    ];
   

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'master_dilevery_day';
}
