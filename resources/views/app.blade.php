<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
{{--@section('sidebar')--}}
{{--This is the master sidebar.--}}
{{--@show--}}


<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">E-Auction</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>

            </ul>
        </div>
    </div>
</nav>


<!-- Header -->
<header class="bg-primary py-5 mb-5">
    <div class="container ">
        <div class="row  align-items-center">
            <div class="col-lg-12">
                <h1 class="text-white mt-5 mb-2">Scopic Test - E-Auction</h1>

            </div>
        </div>
    </div>
</header>


<div class="container">
    @yield('content')
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

</body>
</html>