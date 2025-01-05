<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use App\Models\Subcategorie;
use App\Models\Category;
use App\Models\Childcategories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ChildcategoriesController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $childcategorys = Childcategories::orderBy('id', 'desc')->get();
        return view('BackEnd.childcategories.manage',compact('childcategorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $childcategories = Childcategories::all();
        $subcategory = Subcategorie::all();
        return view('BackEnd.childcategories.index',compact('childcategories','subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $childcategory = new Childcategories();
        $childcategory->name = $request->name;
        $childcategory->slug = Str::slug($request->name);
        $childcategory->subcategory_id = $request->subcategory_id;
        if( $request->hasFile('image') ){
            $image = $request->file('image');
            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'storage/images/';
            $image->move($imagePath, $imageName);

            $childcategory->image   = $imagePath . $imageName;
        }
        $childcategory->meta_title = $request->meta_title ;
        $childcategory->meta_description = $request->meta_description ;
        $childcategory->status = $request->status;
        $childcategory->save();


            return redirect()->route('childcategory.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subcategory = Subcategorie::all();
        $childcategories = Childcategories::find($id);

        return view('BackEnd.childcategories.edit', compact('subcategory','childcategories'));
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
        $childcategory     =  Childcategories::find($request->id);
        $childcategory->name = $request->name;
        $childcategory->slug = Str::slug($request->name);
        $childcategory->subcategory_id = $request->subcategory_id;
        if( $request->hasFile('image') ){
            $image = $request->file('image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'storage/images/';
            $image->move($imagePath, $imageName);

            $childcategory->image   = $imagePath . $imageName;
        }
        $childcategory->meta_title = $request->meta_title ;
        $childcategory->meta_description = $request->meta_description ;
        $childcategory->status = $request->status;
        $childcategory->update();
        return redirect()->route('childcategory.index')->with('success', 'Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */


    public function status($id)
    {
        $childcategory = Childcategories::find($id);
        if($childcategory->status == 1){
            $childcategory->status = 0;
        }else{
            $childcategory->status = 1;
        }
        $childcategory->update();
        return redirect()->back()->with('success', ' Status changed successfully');

    }

}
