<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class EvenController extends Controller
{
    public function store(Request $request)
    {

      
          
        $brand = new Category();
        $brand->even_name = $request->even_name;
        $brand->save();

        return redirect()->route('brand.index')->with('success', 'Brand created successfully.');

    }
}
