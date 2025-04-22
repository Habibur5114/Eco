<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Shipping;

class OrderController extends Controller
{
    public function index()
    {
      $data['shippings'] = Shipping:: all();
      return view('website.pages.checkout',$data);
        
    }
    public function show()
    {
        $data['order'] = Order:: all();
        return view('BackEnd.order.manage',$data);
    }

    public function store(request $request)
    {

    $order = new Order();
    $order->name = $request->name;
    $order->date = Carbon::now()->subDays(rand(1, 365))->format('Y-m-d'); 
    $order->phone = $request->phone;
    $order->address = $request->address;
    $order->total = $request->total;
    $order->status = 'pending';
    $order->save();

    }
}
