<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Childcategories extends Model
{
    public function Product()
    {
        return $this->hasMany('Product::class');
    }


}
