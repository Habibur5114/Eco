<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\Product;
class ShopController extends Controller
{
    public function index(Request $request )
    {
        $query = Product::where('status', 1);  
        
        if ($request->sort_by == "featured") {
            $query->where('featured', 'yes');
        }
        if ($request->brand) {
            $query->where('brands_id', (array) $request->brand); 
        }
       $data['categories'] = Category:: all();
       $data['sliders'] = Slider:: all();
       $data['brands'] = Brand:: all();
       $data['products'] = Product::where('status', 1)->orderBy('created_at', 'desc')->get();
       $data['products'] = $query->get();
        return view('website.pages.shop',$data);
    }
}
