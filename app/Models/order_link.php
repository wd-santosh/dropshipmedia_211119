<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order_link extends Model
{
     protected $fillable = [
        'product_link',
        'website_link',
        'customer_id',
        'customer_order_id'      
    ];
   

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'order_link';
}
