<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{ asset('website/images/favicon.png')  }} type="image/x-icon">

  <title>
    Buyora
  </title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- slider stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('website/css/bootstrap.css') }}" />
<link href="{{ asset('website/css/style.css') }}" rel="stylesheet" />
<link href="{{ asset('website/css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
          <span>
            Buyora
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('showproduct') }}">
                Shop
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('whyus') }}">
                Why Us
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('testimonial') }}">
                Testimonial
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
            </li>
          </ul>
          <div class="user_option">
            @if(Auth::check())
              <a href="{{ route('dashboard') }}">
                Dashboard
              </a>
            @else
            <a href="{{ route('login') }}">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
            <a href="{{ route('register') }}">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Sign Up
              </span>
            </a>
            @endif
            {{-- <a href="{{ route('cartproduct') }}">
              <i class="fa fa-shopping-bag" aria-hidden="true">{{ $count }}</i>
            </a>
             <a href="{{ route('orderproduct') }}">
              <i class="fas fa-truck" aria-hidden="true"></i>
            </a>
           <form class="form-inline ">
    <i class="fa fa-user" aria-hidden="true"></i>
    <span>
        {{ Auth::user()->name }}
    </span>
</form> --}}

          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->
    <!-- slider section -->

    <section class="slider_section">
      <div class="slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box">
                      <h1>
                       Discover, Shop, and Enjoy
                      </h1>
                      <p>
                       Buyora is a modern online shopping platform designed to make buying gifts simple and enjoyable. Our store offers a wide range of unique products perfect for every occasion, from birthdays and celebrations to everyday surprises. </p>
                      <a href="{{ route('contact') }}">
                        Contact Us
                      </a>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                    <div class="img-box">
                      <img style="width:600px" src="{{ asset('website/images/image3.jpeg') }}" alt="" />

                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </section>

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->

  <section class="shop_section layout_padding">
    @yield('product_latest')
    @yield('product_details')
    @yield('view_cart')
    @yield('Orders')
    @yield('stripe')
    @yield('why')
    @yield('test')
    @yield('contact')
    @yield('login')
     @yield('register')
     @yield('forget')
     @yield('verify')
     @yield('confirm')
     @yield('reset')
  </section>

  <!-- end shop section -->







  <!-- contact section -->



  <br><br><br>

  <!-- end contact section -->



  <!-- info section -->

  <section class="info_section  layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        <a href="">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-youtube" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6>
              ABOUT US
            </h6>
            <p>
             We are an online shopping platform offering quality gifts and products for every occasion, providing secure payments, fast delivery, and a smooth shopping experience for customers. 🛍️  </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_form ">
              <h5>
                Newsletter
              </h5>
              <form action="#">
                <input type="email" placeholder="Enter your email">
                <button>
                  Subscribe
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              NEED HELP
            </h6>
            <p>
           Need help with your order or payment? Our support team is ready to assist you anytime. Contact us for quick solutions, guidance, and a better shopping experience. 😊  </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              CONTACT US
            </h6>
            <div class="info_link-box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> Nagercoil, KanyaKumari</span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>+91 7589390971</span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span> buyora.shop@gmail.com</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- footer section -->
    <footer class=" footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Web Tech Knowledge</a>
        </p>
      </div>
    </footer>
    <!-- footer section -->

  </section>

  <!-- end info section -->


 <script src="{{ asset('website/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('website/js/bootstrap.js') }}"></script>
<script src="{{ asset('website/js/custom.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
var stripe = Stripe("{{ env('STRIPE_KEY') }}");

var elements = stripe.elements();
var card = elements.create("card");

card.mount("#card-element");

var form = document.getElementById("payment-form");

form.addEventListener("submit", function(event) {

event.preventDefault();

stripe.createToken(card).then(function(result){

if(result.error){

alert(result.error.message);

}else{

var hiddenInput=document.createElement("input");

hiddenInput.setAttribute("type","hidden");

hiddenInput.setAttribute("name","stripeToken");

hiddenInput.setAttribute("value",result.token.id);

form.appendChild(hiddenInput);

form.submit();

}

});

});
</script>

<script>
$(document).on('click','.fav-btn','.icon-btn', function(e){
    e.preventDefault();

    var button = $(this);
    var product_id = button.data('id');

    $.ajax({
        url: "/favourite/" + product_id,
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}"
        },
        success: function(response){
            if(response.status == 1){
                button.addClass('active');   // heart red
            } else {
                button.removeClass('active'); // heart gray
            }
        },
        error: function(xhr){
            console.log(xhr.responseText);
        }
    });
});
</script>
<script>
document.querySelector('.user-toggle').onclick = function(){
    document.querySelector('.dropdown-menu').classList.toggle('show');
}
</script>
</body>

</html>
