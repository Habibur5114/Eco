<?php


namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function index()
    {
        $data['slides'] = Slider:: all();
        return view('BackEnd.slide.manage',$data);
    }
    
    public function create()
    { 
        return view('BackEnd.slide.index');
    }
    
    public function store(Request $request)
    {

        $slide = new Slider();
        $slide->title = $request->title;
        $slide->slug = Str::slug($request->title);
        if( $request->hasFile('image') ){
            $image = $request->file('image');

            $imageTitle          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'storage/images/';
            $image->move($imagePath, $imageTitle);

            $slide->image   = $imagePath . $imageTitle;
        }
        $slide->short_des = $request->short_des ;
        $slide->link = $request->link ;
        $slide->status = $request->status;
        $slide->save();

        return redirect()->route('slide.index')->with('success', 'Slide created successfully.');

    }


    public function show($id)
    {
        $data['slide'] = Slider::find($id);
        return view('BackEnd.slide.index',$data);
    }

    public function update(Request $request)
    {
        $id=$request->id;
        $slide     =  Slider::find($request->id);
        $slide->title = $request->title;
        $slide->slug = Str::slug($request->title);
        if( $request->hasFile('image') ){
            $image = $request->file('image');

            $imageTitle          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'storage/images/';
            $image->move($imagePath, $imageTitle);

            $slide->image   = $imagePath . $imageTitle;
        }
        $slide->short_des = $request->short_des ;
        $slide->link = $request->link ;
        $slide->status = $request->status;
        $slide->save();
        return redirect()->route('slide.index')->with('success', 'Update successfully.');
    }

    public function delete($id)
    {
        $slide     =  Slider::find($id);
        if( !empty($slide->image) && file_exists($slide->image) ){
            unlink($slide->image);
       }
       $slide->delete();
       return redirect()->back()->with('success', 'Slide delete successfully');
    }


    public function status($id)
    {
      $slide = Slider::find($id);
      $slide->status = !$slide->status;
      $slide->save();
      return back()->with('success', ' Status changed successfully');

    }
}
