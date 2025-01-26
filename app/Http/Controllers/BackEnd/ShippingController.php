<?php
namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{

    public function index()
    {
        $data['shippings'] = Shipping::all();
        return view('BackEnd.setting.shipping.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('BackEnd.setting.shipping.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $shipping = new Shipping();
        $shipping->name = $request->name;
        $shipping->status = $request->status;
        $shipping->save();

      return redirect()->route('shipping.index')->with('success','Shipping Charge added successfull');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $shippings = Shipping::find($id);

        return view('BackEnd.setting.shipping.form', compact('shippings'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $shipping = Shipping:: find($request->id);
        $shipping->name = $request->name;
        $shipping->status = $request->status;
        $shipping->save();

      return redirect()->route('shipping.index')->with('success','Shipping Charge Update successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $shipping = Shipping:: find($id);
       $shipping->delete();
       return redirect()->back()->with('success', ' Delete successfully');
    }

    public function  status($id){

        $shipping = Shipping::find($id);
        if($shipping->status == 1){
            $shipping->status = 0 ;
        }else{
            $shipping->status = 1;
        }
        $shipping->update();
        return redirect()->back()->with('success', ' Status changed successfully');
    }




}
