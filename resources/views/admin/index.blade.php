<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/font.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <link rel="stylesheet" href="{{ asset('admin/css/style.default.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.ico') }}">
</head>

<body>

<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <div class="navbar-header">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <div class="brand-text brand-big text-uppercase">
                        <strong class="text-primary">Dark</strong><strong>Admin</strong>
                    </div>
                </a>
                <button class="sidebar-toggle">
                    <i class="fa fa-long-arrow-left"></i>
                </button>
            </div>

            <div class="right-menu list-inline no-margin-bottom">
                <div class="list-inline-item logout">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link text-white">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </nav>
</header>

<div class="d-flex align-items-stretch">

    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar">
                <img src="{{ asset('admin/img/avatar-6.jpg') }}" class="img-fluid rounded-circle">
            </div>
            <div class="title">
                <h1 class="h5">Admin</h1>
                <p>E-Commerce</p>
            </div>
        </div>

        <span class="heading">Main</span>
        <ul class="list-unstyled">

            <li>
                <a href="{{ url('/') }}">
                    <i class="icon-home"></i> Home
                </a>
            </li>

            <!-- Category -->
            <li>
                <a href="#categoryDropdown" data-toggle="collapse">
                    <i class="icon-windows"></i> Category
                </a>
                <ul id="categoryDropdown" class="collapse list-unstyled">
                    <li><a href="{{ route('addcategory') }}">Add Category</a></li>
                    <li><a href="{{ route('viewcategory') }}">View Category</a></li>
                </ul>
            </li>

            <!-- Example -->
            <li>
                <a href="#exampleDropdown" data-toggle="collapse">
                    <i class="icon-windows"></i> Product
                </a>
                <ul id="exampleDropdown" class="collapse list-unstyled">
                    <li><a href="{{ route('addproduct') }}">Add Product</a></li>
                    <li><a href="{{ route('viewproduct') }}">View Product</a></li>
                    <li><a href="{{ route('showorder') }}">View Orders</a></li>
                </ul>
            </li>

        </ul>
    </nav>

    <!-- Page Content -->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Dashboard</h2>
            </div>
        </div>

        <section class="no-padding-top no-padding-bottom">
            @yield('content')
            @yield('category')
            @yield('viewcategory')
            @yield('edit_category')
            @yield('addproduct')
            @yield('viewproduct')
            @yield('editproduct')
            @yield('vieworder')
        </section>

        <footer class="footer">
            <div class="container-fluid text-center">
                <p>2018 © Your company</p>
            </div>
        </footer>
    </div>
</div>

<!-- JS Files -->
<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendor/popper.js/umd/popper.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
<script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin/js/front.js') }}"></script>

</body>
</html>
