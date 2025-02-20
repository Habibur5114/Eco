<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class WebsiteController extends Controller
{
    public function index()
{
    return view('website.pages.index');
}

public function details($slug)
{
  
    $product = Product::where('slug', $slug)->firstOrFail(); 

    $relatedProducts = Product::where('categories_id', $product->categories_id) 
                              ->where('slug', '<>', $slug) 
                              ->limit(8) 
                              ->get(); 
    return view('website.pages.details', compact('product', 'relatedProducts'));
}

}
