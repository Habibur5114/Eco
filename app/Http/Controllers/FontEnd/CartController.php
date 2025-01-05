<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategorie;
use Darryldecode\Cart\Facades\CartFacade as Cart;


class CartController extends Controller
{
    public function index(){
        $categories = Category::with('subcategories')->get();
        return view('FontEnd.pages.carts',compact('categories'));
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
        ]);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

}

public function delete($id){
    Cart::remove($id);
    return redirect()->back()->with('success', 'Product  delete successfully!');
}

// public function update(Request $request, $id){

//     $request->validate([
//         'quantity' => 'required|min:1',
//     ]);

//     Cart::update($id, array(

//         'quantity' => $request->quantity,
//       ));

//       return redirect()->back();

// }


public function update(Request $request, $id)
{
    $action = $request->input('action');
    $cartItem = Cart::get($id); // Get the specific cart item by its ID

    if (!$cartItem) {
        return back()->withErrors(['Item not found in cart.']);
    }

    if ($action === 'increment') {
        // Increase quantity
        Cart::update($id, [
            'quantity' => 1, // Increment by 1
        ]);
    } elseif ($action === 'decrement') {
        if ($cartItem->quantity > 1) {
            // Decrease quantity if greater than 1
            Cart::update($id, [
                'quantity' => -1, // Decrement by 1
            ]);
        } else {
            return back()->withErrors(['Quantity cannot be less than 1.']);
        }
    } else {
        return back()->withErrors(['Invalid action.']);
    }

    return back()->with('success', 'Cart updated successfully.');
}



}
