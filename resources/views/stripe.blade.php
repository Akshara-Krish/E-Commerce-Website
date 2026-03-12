@extends('index')
@section('stripe')

    <title>Stripe Payment</title>




<div class="container">






    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="panel panel-default credit-card-box">


                <div class="panel-body">



                    @if (Session::has('success'))

                        <div class="alert alert-success text-center">

                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                            <p>{{ Session::get('success') }}</p>

                        </div>

                    @endif

<div class="checkout-card">

<h3 class="checkout-title">Secure Payment</h3>

<form id="payment-form" action="{{ route('stripe.post') }}" method="POST">
@csrf

<div class="form-group mb-3">
<label>Receiver Name</label>
<input type="text" name="receiver_name" class="form-control" placeholder="Enter your name" required>
</div>

<div class="form-group mb-3">
<label>Receiver Address</label>
<input type="text" name="receiver_address" class="form-control" placeholder="Enter delivery address" required>
</div>

<div class="form-group mb-3">
<label>Receiver Phone</label>
<input type="text" name="receiver_phone" class="form-control" placeholder="Enter phone number" required>
</div>

<div class="form-group mb-3">
<label>Card Details</label>
<div id="card-element"></div>
</div>

<input type="hidden" name="price" value="{{$price}}">

<button class="btn btn-primary btn-lg btn-block pay-btn w-100">
Pay Now ${{$price}}
</button>

</form>

</div>

                </div>

            </div>

        </div>

    </div>



</div>








@endsection()
