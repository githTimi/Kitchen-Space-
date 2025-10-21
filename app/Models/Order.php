<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // 
     protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'title',
        'quantity',
        'price',
        'img',
        'delivery_status',
    
       
      
    ];
}
