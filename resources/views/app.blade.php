<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
{{--@section('sidebar')--}}
    {{--This is the master sidebar.--}}
{{--@show--}}

<div class="container">
    @yield('content')
</div>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

</body>
</html>