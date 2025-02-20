<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
class BrandController extends Controller
{
    public function index()
    {
        $data['brands'] = Brand:: all();
        return view('BackEnd.brand.manage',$data);
    }
    
    public function create()
    { 
        return view('BackEnd.brand.index');
    }
    
    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        if( $request->hasFile('image') ){
            $image = $request->file('image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'storage/images/';
            $image->move($imagePath, $imageName);

            $brand->image   = $imagePath . $imageName;
        }
        $brand->meta_title = $request->meta_title ;
        $brand->status = $request->status;
        $brand->save();

        return redirect()->route('brand.index')->with('success', 'Brand created successfully.');

    }


    public function show($id)
    {
        $data['brand'] = Brand::find($id);
        return view('BackEnd.brand.index',$data);
    }

    public function update(Request $request)
    {
        $id=$request->id;
        $brand     =  Brand::find($request->id);
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        if( $request->hasFile('image') ){
            $image = $request->file('image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'storage/images/';
            $image->move($imagePath, $imageName);

            $brand->image   = $imagePath . $imageName;
        }
        $brand->meta_title = $request->meta_title ;
        $brand->status = $request->status;
        $brand->save();
        return redirect()->route('brand.index')->with('success', 'Update successfully.');
    }

    public function delete($id)
    {
        $brand     =  Brand::find($id);
        if( !empty($brand->image) && file_exists($brand->image) ){
            unlink($brand->image);
       }
       $brand->delete();
       return redirect()->back()->with('success', 'Brand delete successfully');
    }


    public function status($id)
    {
      $brand = Brand::find($id);
      $brand->status = !$brand->status;
      $brand->save();
      return back()->with('success', ' Status changed successfully');

    }
}
