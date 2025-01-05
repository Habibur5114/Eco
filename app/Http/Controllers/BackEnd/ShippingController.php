<?php
namespace App\Http\Controllers\BackEnd;
namespace App\Http\Controllers;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $shippings = Shipping::all();
      return view('BackEnd.setting.setting.manage',compact('shippings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('BackEnd.setting.setting.indext',);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $shippings = new Shipping();
        $shippings->name = $request->name;
        $shippings->amount = $request->amount;
        $shippings->status = $request->status;
        $shipping->save();

        return redirect()->route('shipping.index')->with('success', 'shipping created successfully.');
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
    public function edit(Shipping $shipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shipping $shipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipping $shipping)
    {
        //
    }
}
