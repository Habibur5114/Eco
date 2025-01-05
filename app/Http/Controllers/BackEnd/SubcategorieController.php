<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use App\Models\Subcategorie;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SubcategorieController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategorys = Subcategorie::orderBy('id', 'desc')->get();
        return view('BackEnd.subcategories.manage',compact('subcategorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        $subcategory = Subcategorie::all();
        return view('BackEnd.subcategories.index',compact('categories','subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'status' => 'required',
        ]);

        $subcategory = new Subcategorie();
        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug($request->name);
        $subcategory->category_id = $request->category_id;
        if( $request->hasFile('image') ){
            $image = $request->file('image');
            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'storage/images/';
            $image->move($imagePath, $imageName);

            $subcategory->image   = $imagePath . $imageName;
        }
        $subcategory->meta_title = $request->meta_title ;
        $subcategory->meta_description = $request->meta_description ;
        $subcategory->status = $request->status;
        $subcategory->save();


            return redirect()->route('subcategory.index')->with('success', 'User created successfully.');
    }







    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categories = Category::all();
        $subcategory = Subcategorie::find($id);
        return view('subcategories.edit', compact('subcategory','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id=$request->id;
        $subcategory     =  Subcategorie::find($request->id);
        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug($request->name);
        $subcategory->category_id = $request->category_id;
        if( $request->hasFile('image') ){
            $image = $request->file('image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'storage/images/';
            $image->move($imagePath, $imageName);

            $subcategory->image   = $imagePath . $imageName;
        }
        $subcategory->meta_title = $request->meta_title ;
        $subcategory->meta_description = $request->meta_description ;
        $subcategory->status = $request->status;
        $subcategory->update();
        return redirect()->route('subcategory.index')->with('success', 'Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */


    public function status($id)
    {
        $subcategory = Subcategorie::find($id);
        if($subcategory->status == 1){
            $subcategory->status = 0;
        }else{
            $subcategory->status = 1;
        }
        $subcategory->update();
        return redirect()->back()->with('success', ' Status changed successfully');

    }

}
