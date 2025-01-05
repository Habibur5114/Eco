@extends('FontEnd.layout.master')
@section('content')
<div class="container m-5 ">
    <div class="row">
        <div class="col-lg-12 p-5 ">

            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>

                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach (Cart::getContent() as $cart)


                  <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                    <td>{{$cart->name}}</td>
                    <td >


                        <div class="d-inline-block p-2 border rounded text-center" style="min-width: 100px;">
                            <!-- Decrement Form -->
                            <form action="{{ route('carts.update', $cart->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" name="action" value="decrement" class="btn btn-sm btn-danger">-</button>
                            </form>

                            <!-- Quantity Display -->
                            <span class="mx-2" style="display: inline-block; width: 30px; text-align: center;">
                                {{ $cart->quantity }}
                            </span>

                            <!-- Increment Form -->
                            <form action="{{ route('carts.update', $cart->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" name="action" value="increment" class="btn btn-sm btn-success">+</button>
                            </form>
                        </div>



                    </td>
                    {{-- <td>{{$cart->price}}Tk</td> --}}

                    <td>
                        {{$cart->price *$cart->quantity }} BDT
                    </td>
                    <td>
                        <a href="{{route('carts.delete',$cart->id)}}">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>

                  </tr>
                  @endforeach

                  <tr>
                    <td colspan = "2"></td>
                    <td>Grand total:</td>
                    <td>Total: {{Cart::getSubTotal()}} BDT</td>
                    <td>
                        <button class="btn btn-success">BUY Now</button>
                    </td>
                  </tr>
                </tbody>
              </table>



        </div>
    </div>
</div>
@endsection
