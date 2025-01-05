
@extends('FontEnd.layout.master')

@section('content')

<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<section class="py-5">


    <div class="container px-4 px-lg-5 mt-5">



     <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($products as $product)
            <div class="col mb-5">
                <div class="card h-100 p-2">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{asset($product->image)}}" style="height:180px" alt="..." />
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
                    <form action="{{ route('carts.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class=" form-control btn btn-success mb-3 p-2 ">Add To Cart</button>
                    </form>


                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection


