<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Coupon;
class CouponController extends Controller
{
    public function index()
    {
        $data['coupons'] = Coupon:: all();
        return view('BackEnd.coupon.manage',$data);
    }

    public function create()
    {
        return view('BackEnd.coupon.index');
    }

    public function show($id)
    {
        $data['coupon'] = coupon::find($id);
        return view('BackEnd.coupon.index',$data);
    }


    public function store(Request $request)
    {

        // Create and save the coupon
        $coupon = new Coupon();
        $coupon->coupon_code= $request->coupon_code;
   
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->card_value = $request->card_value;
        $coupon->expiry_date = $request->expiry_date;
        $coupon->status = $request->status;
        $coupon->save();
         
     return redirect()->route('coupon.index')->with('success', 'coupon created successfully.');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $coupon = Coupon::find($request->id);
        $coupon->coupon_code = $request->coupon_code;
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->card_value = $request->card_value;
        $coupon->expiry_date = $request->expiry_date;
        $coupon->status = $request->status;
        $coupon->update();

        return redirect()->route('coupon.index')->with('success', 'coupon update successfully.');

    }


   public function delete($id)
   {
    $coupon = Coupon::find($id);
    $coupon->delete();
    return back()->with('success','Delete Data successfully');
   }



    public function status($id)
    {
        $coupon = Coupon::find($id);
        $coupon->status = !$coupon->status;
        $coupon->save();

        return back()->with('success','Status changed successfully');
    }
}
