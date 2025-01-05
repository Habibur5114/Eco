<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Subcategorie;
use App\Models\Childcategories;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('BackEnd.product.manage',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('BackEnd.product.index',compact('categories'));
    }


    public function getSubcategories(Request $request)
    {
        $subcategories = Subcategorie::where('category_id', $request->category_id)->get();
        return response()->json($subcategories);
    }


    public function getChildCategories(Request $request)
    {
        $childcategories = Childcategories::where('subcategory_id', $request->subcategory_id)->get();
        return response()->json($childcategories);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'categories_id' => 'required',
            'regular_price' => 'required',
            'regular_price' => 'required',
            'sale_price' => 'required',
            'quantity' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'image' => 'required',

        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->categories_id = $request->categories_id;
        $product->subcategories_id = $request->subcategories_id;
        $product->childcategories_id = $request->childcategories_id;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->quantity = $request->quantity;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->status = $request->status;
        if( $request->hasFile('image') ){
            $image = $request->file('image');
            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'storage/images/';
            $image->move($imagePath, $imageName);

            $product->image   = $imagePath . $imageName;
        }
       $product->save();

   return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('BackEnd.product.edit', compact('product','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request,)
    // {


    //     $id=$request->id;
    //     $subcategory   =  Product::find($request->id);
    //     $product->name = $request->name;
    //     $product->slug = Str::slug($request->name);
    //     $product->categories_id = $request->categories_id;
    //     $product->subcategories_id = $request->subcategories_id;
    //     $product->childcategories_id = $request->childcategories_id;
    //     $product->regular_price = $request->regular_price;
    //     $product->sale_price = $request->sale_price;
    //     $product->quantity = $request->quantity;
    //     $product->meta_title = $request->meta_title;
    //     $product->meta_description = $request->meta_description;
    //     $product->status = $request->status;
    //     if( $request->hasFile('image') ){
    //         $image = $request->file('image');
    //         $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
    //         $imagePath          = 'storage/images/';
    //         $image->move($imagePath, $imageName);

    //         $product->image   = $imagePath . $imageName;
    //     }
    //    $product->update();

    //    return redirect()->route('product.index')->with('success', 'Product update successfully.');

    // }




    public function update(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'categories_id' => 'required|integer',
            'regular_price' => 'required|numeric',
            // Add other necessary validation rules here
        ]);

        // Find the product by ID
        $product = Product::find($request->id);
        // Update product details
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->categories_id = $request->categories_id;
        $product->subcategories_id = $request->subcategories_id;
        $product->childcategories_id = $request->childcategories_id;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->quantity = $request->quantity;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->status = $request->status;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = microtime(true) . '.' . $image->getClientOriginalExtension();
            $imagePath = 'storage/images/';

            // Move the uploaded file
            $image->move(public_path($imagePath), $imageName);

            // Set the new image path
            $product->image = $imagePath . $imageName;
        }
        $product->save();

        // Redirect back with success message
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product     =  Product::find($id);
        if( !empty($user->image) && file_exists($product->image) ){
            unlink($user->image);
       }
       $product->delete();
       return redirect()->back()->with('success', 'Product delete successfully');

    }

    public function status($id)
    {
        $product = Product::find($id);
        if($product->status == 1){
            $product->status = 0;
        }else{
            $product->status = 1;
        }
        $product->update();
        return redirect()->back()->with('success', ' Status changed successfully');

    }
}
