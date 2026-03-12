@extends('index')
@section('view_cart')

    <title>My Cart</title>
    <style>
  .cart-page{
    display:flex;
    gap:40px;
    align-items:flex-start;
}

/* LEFT SIDE */
.cart-products{
    width:65%;
}

/* RIGHT SIDE */
.cart-summary{
    width:35%;
    background:#fff;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
    height:fit-content;
    margin-top:50px;
    margin-right:130px;
}

/* Cart Item */
.cart-item{
    margin-left:200px;
    width:70%;
    height:30%;
    display:flex;
    justify-content:space-between;
    align-items:center;
    border:1px solid #ddd;
    padding:15px;
    margin-bottom:15px;
    border-radius:8px;
}

.cart-left{
    display:flex;
    gap:15px;
    align-items:center;
}

.cart-left img{
    width:80px;
    height:80px;
    object-fit:cover;
}

.pay-btn{
    width:100%;
    margin-top:15px;
}
.title{

    margin-left:300px;
}
    </style>



<div class="cart-page">

    <!-- LEFT SIDE : CART PRODUCTS -->
    <div class="cart-products">
        <h2 class="title">My Shopping Cart</h2>

        @php
        $price = 0;
        @endphp

        @forelse($cart as $cart_product)

        <div class="cart-item">
            <div class="cart-left">
                <img src="{{ asset('storage/'.$cart_product->product->image) }}">

                <div class="product-info">
                    <h4>{{ $cart_product->product->name }}</h4>
                    <p>{{ $cart_product->product->price }}</p>
                </div>
            </div>

            <div class="cart-right">
                <form action="{{ route('deletecart',$cart_product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">Remove</button>
                </form>
            </div>
        </div>

        @php
        $price = $price + $cart_product->product->price;
        @endphp
      @empty

        <div style="text-align:center; margin-top:40px;">
            <img src="{{ asset('website/images/cart.png') }}" width="550">

        </div>

        @endforelse
    </div>


    <!-- RIGHT SIDE : SUMMARY -->
    <div class="cart-summary">

        <h3>Order Summary</h3>

        <p>Grand Total</p>

        <h2>₹ {{$price}}</h2>

        <a href="{{ route('stripe',$price) }}" class="btn btn-success pay-btn">
            Pay with Stripe
        </a>

    </div>

</div>
@endsection
