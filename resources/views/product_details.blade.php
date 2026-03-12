@extends('index')
 @section('product_details')


<style>
.product-container {
    max-width: 1100px;
    margin: 50px auto;
    padding: 20px;
}

.product-image img {
    width: 100%;
    height: 500px;
    object-fit: cover;
    border-radius: 10px;
}

.product-info {
    margin-top: 30px;
}

.product-title {
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 10px;
}

.product-price {
    font-size: 24px;
    color: #e63946;
    font-weight: 600;
    margin-bottom: 20px;
}

.product-description {
    font-size: 16px;
    color: #555;
    margin-bottom: 20px;
}

.product-details ul {
    list-style: none;
    padding: 0;
}

.product-details li {
    padding: 8px 0;
    border-bottom: 1px solid #eee;
}

.add-cart-btn {
    margin-top: 25px;
}

.add-cart-btn button {
    background: #000;
    color: #fff;
    padding: 12px 30px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

.add-cart-btn button:hover {
    background: #e63946;
}

</style>
@if(session('success'))
<div class="alert alert-success">
            {{ session('success') }}
        </div>
@endif

<div class="btn-box">
        <a href="{{ route('index') }}">
          Back to Home
        </a>
      </div>
      <div class="product-container">
    <!-- Product Image -->
    <div class="product-image">
        <img src="{{ asset('storage/'.$product->image) }}" alt="Product Image">
    </div>
<div class="product-info-main">
    <!-- Product Info -->
    <div class="product-info">
        <div class="product-header">
        <div class="product-title">
            {{ $product->name }}
        </div>

        <div class="product-icons">
             <div class="fav">
  <button class="icon-btn {{ in_array($product->id,$favourites) ? 'active' : '' }}"
        data-id="{{ $product->id }}">
    <i class="fa fa-heart"></i>
</button>
</div>

            <a href="#" class="icon-btn"><i class="fa fa-share-alt"></i></a>
        </div>
    </div>

        <div class="product-price">
            {{ $product->price }}
        </div>

        <div class="product-description">
            {{ $product->description }}
        </div>


        <div class="add-cart-btn">
    <a href="{{ route('addtocart',$product->id) }}">
        <i class="fa fa-shopping-cart"></i> Add to Cart
    </a>
     <a href="{{ route('cartproduct') }}">
        <i class="fa fa-shopping-cart"></i> Go to Cart
    </a>
</div>
    </div>
    {{-- <div class="product-infos">
       <div class="product-title">
        {{ $product->name }}
    </div>

    <div class="product-actions">

        <a href="#" class="action-btn favorite">
            <i class="fa fa-heart"></i>
        </a>

        <a href="#" class="action-btn share">
            <i class="fa fa-share-alt"></i>
        </a>

        <a href="#" class="action-btn compare">
            <i class="fa fa-exchange"></i>
        </a>

    </div>

    <div class="add-cart-btn">
        <a href="{{ route('addtocart',$product->id) }}">Add to Cart</a>
    </div>

    </div> --}}
</div>


</div>


    @endsection
