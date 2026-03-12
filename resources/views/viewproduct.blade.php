@extends('index')
@section('product_latest')
<div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="btn-box">
        <a href="{{ route('index') }}">
          Back to Home
        </a>
      </div>
      <div class="row">
        @foreach($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box">

    <a href="{{ route('productdetails',$product->id) }}">
        <div class="img-box">
            <img src="{{ asset('storage/' . $product->image) }}" alt="">
        </div>

        <div class="detail-box">
            <h6>{{ $product->name }}</h6>

            <h6>
                Price
                <span>${{ $product->price }}</span>
            </h6>

        </div>

    </a>

    <div class="icons">


       <div class="fav">
  <button class="fav-btn {{ in_array($product->id,$favourites) ? 'active' : '' }}"
        data-id="{{ $product->id }}">
    <i class="fa fa-heart"></i>
</button>
</div>

    </div>

</div>
        </div>

        @endforeach

      </div>

    </div>
    @endsection
