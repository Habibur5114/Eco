<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Coupon;
use Illuminate\Support\Carbon;
use Darryldecode\Cart\Facades\CartFacade as Cart;
class shopingCartController extends Controller
{
    public function index()
    {
        $data['shippings'] = Shipping:: all();
        return view('website.pages.cart',$data);
    }

    
    public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
    ]);
    $product = Product::find($request->product_id);
    if (!is_null($product)) {

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->sale_price,
            'quantity' => 1,
            'attributes' => [
             'image' => $product->image,
              ],
        ]);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

}

public function delete($id){
    Cart::remove($id);
    return redirect()->back()->with('success', 'Product  delete successfully!');
}



   
public function update(Request $request, $id)
{
    $cartItem = Cart::get($id);
    
    if (!$cartItem) {
        return back()->withErrors(['Item not found in cart.']);
    }

    $action = $request->input('action');
    $quantity = ($action === 'increment') ? 1 : (($action === 'decrement' && $cartItem->quantity > 1) ? -1 : 0);

    if ($quantity) {
        Cart::update($id, ['quantity' => $quantity]);
        return back()->with('success', 'Cart updated successfully.');
    }

    return back()->withErrors(['Invalid action or quantity too low.']);
}





public function applyCoupon(Request $request)
    {
        // $request->validate([
        //     'coupon_code' => 'required|string|exists:coupons,coupon_code'
        // ]);

        $coupon = Coupon::where('coupon_code', $request->coupon_code)
                        ->where('expiry_date', '>=', now())
                        ->where('status', 'active')
                        ->first();

        if (!$coupon) {
            return response()->json(['error' => 'Invalid or expired coupon!'], 400);
        }

        $subtotal = Cart::getSubTotal();
        $discount = 0;

        if ($coupon->type == 'percentage') {
            $discount = ($subtotal * $coupon->value) / 100;
        } elseif ($coupon->type == 'fixed') {
            $discount = $coupon->value;
        }

        $total = $subtotal - $discount;

        session()->put('coupon', [
            'code' => $coupon->coupon_code,
            'discount' => $discount,
            'total' => $total
        ]);

        return response()->json([
            'message' => 'Coupon applied successfully!',
            'discount' => number_format($discount, 2),
            'total' => number_format($total, 2)
        ]);
    }








}
