<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Subcategorie extends Model
{
    protected $fillable = [
        'category_id',
    ];


    public function Product()
   {
       return $this->hasMany('Product::class');
   }

   public function category()
   {
       return $this->belongsTo(Category::class);
   }



}
