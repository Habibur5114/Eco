<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    
    public function Product()
   {
       return $this->hasMany('Product::class');
   }
}
