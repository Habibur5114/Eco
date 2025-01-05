@extends('FontEnd.layout.master')
@section('content')



<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

        <h3><a href=""></a></h3>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($productts as $product)
            <div class="col mb-5">
                <div class="card h-100 p-2">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{asset($product->image)}}" style="height:180px"alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{$product->name}}</h5>
                            <!-- Product price-->
                            <span class="original">${{$product->regular_price}}</span> -
                             <span>${{$product->sale_price}}</span>
                        </div>
                    </div>

                    <button class="btn btn-success mb-3 p-2">Add To Card</button>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
