@extends('index')
@section('Orders')
    <title>My Orders</title>
<style>
    .container{
    width: 80%;
    margin: auto;
    margin-top: 40px;
}

.container h2{
    margin-bottom: 20px;
    font-weight: 600;
}

.cart-item{
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: 1px solid #ddd;
    padding: 15px 20px;
    margin-bottom: 15px;
    border-radius: 10px;
    background: #fff;
    transition: 0.3s;
}

.cart-item:hover{
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.cart-left{
    display: flex;
    align-items: center;
    gap: 15px;
}

.cart-left img{
    width: 90px;
    height: 90px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #eee;
}

.product-info h4{
    margin: 0;
    font-size: 18px;
    font-weight: 600;
}

.product-info p{
    margin: 4px 0;
    color: #555;
    font-size: 14px;
}

.cart-right{
    display: flex;
    align-items: center;
}

.remove-btn{
    background: #ff4d4d;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
    transition: 0.3s;
}

.remove-btn:hover{
    background: #e60000;
}
.title{
    text-align: center;
    margin-bottom: 30px;
}
    </style>
  <div class="container">
    <h2 class="title">My Orders</h2>

@forelse($orders as $order)

<div class="cart-item">
    <div class="cart-left">
        <img src="{{ asset('storage/' . $order->product->image) }}" alt="{{ $order->product->name }}">

        <div class="product-info">
            <h4>{{ $order->product->name }}</h4>
            <p>Price: ${{ number_format($order->product->price, 2) }}</p>
            <p>Status: {{ ucfirst($order->status) }}</p>
        </div>
    </div>

    <div class="cart-right">
        <form action="{{ route('updateorderstatus', $order->id) }}" method="POST">
            @csrf
            <input type="hidden" name="status" value="cancelled">

            <button type="submit" class="remove-btn"
            onclick="return confirm('Are you sure you want to cancel this order?')">
                Cancel Order
            </button>
        </form>
    </div>
</div>

@empty

<div style="text-align:center; margin-top:40px;">
    <img src="{{ asset('website/images/order.png') }}" width="550">

</div>

@endforelse
</div>
@endsection
