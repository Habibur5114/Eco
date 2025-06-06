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
    public function brand()
    {
        return $this->belongsTo('brand::class','brands_id');
    }
    public function size()
    {
        return $this->belongsTo('Size::class','sizes_id');
    }
    public function color()
    {
        return $this->belongsTo('Color::class','colors_id');
    }


}
