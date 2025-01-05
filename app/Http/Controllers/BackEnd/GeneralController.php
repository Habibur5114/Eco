<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $general = General::all();
        return view('BackEnd.setting.general.manage',compact('general'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        $generals = General::find($id);
        return view('BackEnd.setting.general.index',compact('generals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $general     =  General::find($request->id);
        $general->name = $request->name;
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = microtime(true) . '.' . $image->getClientOriginalExtension();
            $imagePath = 'storage/logo/';

        if( !empty($general->logo) && file_exists($general->logo) ){
          unlink($general->logo);
          }
            $image->move(public_path($imagePath), $imageName);
            $general->logo = $imagePath . $imageName;
        }
        if ($request->hasFile('favicon')) {
            $image = $request->file('favicon');
            $imageName = microtime(true) . '.' . $image->getClientOriginalExtension();
            $imagePath = 'storage/favicon/';

        if( !empty($general->favicon) && file_exists($general->favicon) ){
          unlink($general->favicon);
          }
            $image->move(public_path($imagePath), $imageName);
            $general->favicon = $imagePath . $imageName;
        }



        $general->status = $request->status;
        $general->save();
        return redirect()->route('general.index')->with('success', 'Update successfully');

    }

    public function status($id)
    {
        $general = General::find($id);
        if($general->status == 1){
            $general->status = 0;
        }else{
            $general->status = 1;
        }
        $general->update();
        return redirect()->back()->with('success', ' Status changed successfully');

    }


}
