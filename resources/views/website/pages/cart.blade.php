@extends('website.layout.master')
@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            <h2 class="page-title">Cart</h2>
            <div class="checkout-steps">
                <a href="cart.html" class="checkout-steps__item active">
                    <span class="checkout-steps__item-number">01</span>
                    <span class="checkout-steps__item-title">
                        <span>Shopping Bag</span>
                        <em>Manage Your Items List</em>
                    </span>
                </a>
                <a href="checkout.html" class="checkout-steps__item">
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
            <div class="shopping-cart">
                <div class="cart-table__wrapper">
                    <table class="cart-table">
                        <thead>
                            <tr>

                                <th>Product</th>
                                <th></th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::getContent() as $cart)
                                <tr>

                                    <td>
                                        <div class="shopping-cart__product-item">
                                            <img loading="lazy" src="{{ asset($cart->attributes->image) }}" width="120"
                                                height="120" alt="" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="shopping-cart__product-item__detail">
                                            <h4 style="width:10px">{{ $cart->name }}</h4>
                                            <ul class="shopping-cart__product-item__options">
                                                <li>Color: Yellow</li>
                                                <li>Size: L</li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="shopping-cart__product-price">{{ $cart->price }}</span>
                                    </td>
                                    <td>
                                        <div class="d-inline-block p-2 border rounded text-center" style="min-width: 10px;">

                                            <form action="{{ route('websiteCart.update', $cart->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" name="action" value="decrement"
                                                    class="btn btn-sm btn-danger">-</button>
                                            </form>

                                            <!-- Quantity Display -->
                                            <span class="mx-2"
                                                style="display: inline-block; width: 30px; text-align: center;">
                                                {{ $cart->quantity }}
                                            </span>

                                            <!-- Increment Form -->
                                            <form action="{{ route('websiteCart.update', $cart->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" name="action" value="increment"
                                                    class="btn btn-sm btn-success">+</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="shopping-cart__subtotal">{{ $cart->price * $cart->quantity }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('websiteCart.delete', $cart->id) }}" class="remove-cart">
                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                                <path
                                                    d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="cart-table-footer" >
                        <form id="coupon-form"  class="position-relative bg-body">
                            @csrf
                            <input class="form-control" type="text" name="coupon_code" id="coupon_code" placeholder="Coupon Code" required>
                            <button type="submit" class="btn btn-primary fw-medium position-absolute top-0 end-0 h-100 px-4" onclick="applyCoupon(event)">
                                APPLY COUPON
                            </button>
                        </form>
                       
                        
                        
                   

                       

                    </div>
                </div>
                <div class="shopping-cart__totals-wrapper">
                    <div class="sticky-content">
                        <div class="shopping-cart__totals">
                            <h3>Cart Totals</h3>
                            <table class="cart-totals">
                                <tbody>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>{{ Cart::getSubTotal() }}</td>
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
                                        <td><span id="total">৳{{ number_format($total, 2) }}</span></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                        <div class="mobile_fixed-btn_wrapper">
                            <div class="button-wrapper container">
                                <a href="{{route('checkout')}}" class="btn btn-primary btn-checkout">PROCEED TO CHECKOUT</a>
                            </div>
                        </div>
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

{{-- coupon --}}

