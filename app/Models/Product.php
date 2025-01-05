<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function Category() {
        return $this->belongsTo(Category::class, 'categories_id');
    }
    public function subcategory()
    {
        return $this->belongsTo('Subcategorie::class','subcategories_id');
    }
    public function childcategory()
    {
        return $this->belongsTo('childcategory::class','childcategories_id');
    }


}
