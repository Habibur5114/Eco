<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategorie;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Artisan;
class Fontendcontroller extends Controller
{

    public function index(){


        // $categories = Category::with('subcategories')->get();
        $products = Product::orderBy('id', 'desc')->get();
        $categories = Category::with('subcategories')->get();
        return view('FontEnd.pages.index', compact('products', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    // public function categorywise($slug)
    // {

    //     $categories = Category::with('subcategories')->get();
    //     $productts = Product::where('categories_id',$slug)->get();
    //     return view('FontEnd.pages.categorywise', compact('productts','categories' ));
    // }

    public function categorywise($slug)
{
    $category = Category::where('slug', $slug)->first();
    $productts = Product::where('categories_id', $category->id)->get();
    $categories = Category::with('subcategories')->get();
    return view('FontEnd.pages.categorywise', compact('productts', 'categories'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Fontend $fontend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fontend $fontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fontend $fontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fontend $fontend)
    {
        //
    }


    public function getProductDetails($id)
{
    $product = Product::find($id);

    if ($product) {
        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'regular_price' => $product->regular_price,
            'sale_price' => $product->sale_price,
            'image_url' => asset($product->image),
        ]);
    }


}


public function changeLang($lang)
{
    $availableLanguages = ['en', 'bn'];

    if (in_array($lang, $availableLanguages)) {

        Session::put('locale', $lang);


        app()->setLocale($lang);

        return redirect()->back()->with('success', __('Language changed successfully!'));
    }

}



}
