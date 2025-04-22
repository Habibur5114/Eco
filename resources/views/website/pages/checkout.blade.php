@extends('website.layout.master')
@section('content')

<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Shipping and Checkout</h2>
      <div class="checkout-steps">
        <a href="cart.html" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>Shopping Bag</span>
            <em>Manage Your Items List</em>
          </span>
        </a>
        <a href="checkout.html" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">02</span>
          <span class="checkout-steps__item-title">
            <span>Shipping and Checkout</span>
            <em>Checkout Your Items List</em>
          </span>
        </a>
        <a href="order-confirmation.html" class="checkout-steps__item">
          <span class="checkout-steps__item-number">03</span>
          <span class="checkout-steps__item-title">
            <span>Confirmation</span>
            <em>Review And Submit Your Order</em>
          </span>
        </a>
      </div>
      <form action="{{route('order.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="checkout-form">
          <div class="billing-info__wrapper">
            <div class="row">
              <div class="col-6">
                <h4>SHIPPING DETAILS</h4>
              </div>
              <div class="col-6">
              </div>
            </div>
         
             
            <div class="row mt-5">
              <div class="col-md-12">
                <div class="m-3">
                    <label for="phone">Name *</label>
                  <input type="text" class="form-control" name="name" required="">
                </div>
              </div>
              <div class="col-md-12">
                <div class="m-3">
                    <label for="phone">Phone Number *</label>
                  <input type="text" class="form-control" name="phone" required="">
                </div>
              </div>
            
              <div class="col-md-12">
                <div class="m-3">
                    <label for="phone">Address *(District, Thana, Village)</label>
                  <input type="text" class="form-control" name="address" required="">
                </div>
              </div>
              
            </div>
          </div>
          <div class="checkout__totals-wrapper">
            <div class="sticky-content">
              <div class="checkout__totals">
                <h3>Your Order</h3>
                <table class="checkout-cart-items">
                  <thead>
                    {{-- <tr>
                      <th>PRODUCT</th>
                      <th align="right">SUBTOTAL</th>
                    </tr> --}}
                  </thead>
                  <tbody>
                    @foreach (Cart::getContent() as $cart)
                    <tr>
                      <td>
                        {{$cart->name}}
                      </td>
                      <td align="right">
                        {{ $cart->price * $cart->quantity }}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <table class="checkout-totals">
                  <tbody>
                    <tr>
                      <th>SUBTOTAL</th>
                      <td align="right">{{Cart::getSubTotal()}}</td>
                    </tr>


                    <tr>
                        <th>Shipping</th>
                        <td>
                            @foreach ($shippings as $shipping)
                                <div class="form-check">
                                    <input class="form-check-input form-check-input_fill shipping-method"
                                        type="radio" name="shipping_method" value="{{ $shipping->id }}"
                                        id="flat_rate{{ $shipping->id }}"
                                        data-charge="{{ $shipping->charge }}">
                                        
                                    <label class="form-check-label" for="flat_rate{{ $shipping->id }}">
                                        {{ $shipping->name }}
                                    </label>
                                </div>
                            @endforeach

                        </td>
                    </tr>

                    @php
                    $subtotal = Cart::getSubTotal();
                    $vat = $subtotal * 0.05;
                    $defaultShipping = $shippings->first()->charge ?? 0;
                    $total = $subtotal + $vat + $defaultShipping;
                    @endphp
                <tr>
                    <th>VAT (5%)</th>
                    <td>৳{{ number_format($vat, 2) }}</td>
                </tr>

                <tr>
                    <th>Shipping</th>
                    <td><span id="shipping">৳{{ number_format($defaultShipping, 2) }}</span></td>
                </tr>

                <tr>
                  <th>Total</th>
                  <input type="hidden" name="total" id="total-input" value="{{ number_format($total, 2, '.', '') }}">
                  <td><span id="total">৳{{ number_format($total, 2) }}</span></td>
                 </tr>
                
                  </tbody>
                </table>
              </div>
              <input type="submit" class="btn btn-primary btn-checkout" value="Place Order">
            </form>
            </div>
          </div>
        </div>
    
    </section>
  </main>

@endsection


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const shippingRadios = document.querySelectorAll(".shipping-method");
        const shippingSpan = document.getElementById("shipping");
        const totalSpan = document.getElementById("total");

        let subtotal = {{ $subtotal }};
        let vat = {{ $vat }};

        console.log("Script Loaded"); // Check if script runs

        shippingRadios.forEach(radio => {
            radio.addEventListener("change", function() {
                console.log("Radio changed:", this.value); // Debugging

                let shippingCharge = parseFloat(this.dataset.charge) || 0;
                let newTotal = subtotal + vat + shippingCharge;

                shippingSpan.textContent = `৳${shippingCharge.toFixed(2)}`;
                totalSpan.textContent = `৳${newTotal.toFixed(2)}`;
            });
        });
    });
</script>




