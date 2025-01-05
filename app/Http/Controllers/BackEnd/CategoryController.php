<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = Category::orderBy('id', 'desc')->get();
        return view('BackEnd.categories.manage',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('BackEnd.categories.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        if( $request->hasFile('image') ){
            $image = $request->file('image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'storage/images/';
            $image->move($imagePath, $imageName);

            $category->image   = $imagePath . $imageName;
        }
        $category->meta_title = $request->meta_title ;
        $category->meta_description = $request->meta_description ;
        $category->status = $request->status;
        $category->save();


     return redirect()->route('category.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categorys = Category::find($id);
        return view('BackEnd.categories.edit', compact('categorys'));
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
        $category     =  Category::find($request->id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        if( $request->hasFile('image') ){
            $image = $request->file('image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'storage/images/';
            $image->move($imagePath, $imageName);

            $category->image   = $imagePath . $imageName;
        }
        $category->meta_title = $request->meta_title ;
        $category->meta_description = $request->meta_description ;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('category.index')->with('success', 'Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function status($id)
    {
        $category = Category::find($id);
        if($category->status == 1){
            $category->status = 0;
        }else{
            $category->status = 1;
        }
        $category->update();
        return redirect()->back()->with('success', ' Status changed successfully');

    }
}
