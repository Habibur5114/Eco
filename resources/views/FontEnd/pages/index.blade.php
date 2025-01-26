
@extends('FontEnd.layout.master')

@section('content')

<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">{{ __('messages.ShopInStyle') }}</h1>
            <p class="lead fw-normal text-white-50 mb-0">{{ __('messages.Shop') }}</p>
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
                        <span class="quick-view-btn" data-id="{{ $product->id }}" data-toggle="modal" data-target="#exampleModal">Quick view</span>
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

<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Bangladesh
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{ route('change-lang', 'en') }}">English </a>
    <a class="dropdown-item" href="{{ route('change-lang', 'bn') }}">Bangla</a>
  </div>
</div>


 {{-- model  --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Model Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card h-100 p-2">
                    <img class="card-img-top" src="" style="height:180px" alt="Product Image" />
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder"></h5>
                            <span class="original"></span> -
                            <span class="sale-price"></span>
                        </div>
                    </div>
                    <form action="{{ route('carts.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="">
                        <button type="submit" class="form-control btn btn-success mb-3 p-2">Add To Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quickViewButtons = document.querySelectorAll('.quick-view-btn');

        quickViewButtons.forEach(button => {
            button.addEventListener('click', function () {
                const productId = this.getAttribute('data-id');


                fetch(`/product/${productId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.querySelector('#exampleModal .card-img-top').src = data.image_url;
                        document.querySelector('#exampleModal .fw-bolder').innerText = data.name;
                        document.querySelector('#exampleModal .original').innerText = `$${data.regular_price}`;
                        document.querySelector('#exampleModal .sale-price').innerText = `$${data.sale_price}`;
                        document.querySelector('#exampleModal form input[name="product_id"]').value = data.id;
                    })

            });
        });
    });
</script>


