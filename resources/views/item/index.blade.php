@extends('app')

@section('title', 'Listing')

{{--@section('sidebar')--}}
    {{--@parent--}}

    {{--<p>This is appended to the master sidebar.</p>--}}
{{--@endsection--}}

@section('content')
    <div class="item-gallery">
        <div class="item-wrapper">
            <img src="http://hamagawaortho.com/img/products-icon.png" alt="product">
            <span>current bid</span><span>12</span>
        </div>
        <div class="item-wrapper">
            <img src="http://hamagawaortho.com/img/products-icon.png" alt="product">
            <span>current bid</span><span>12</span>
        </div>
        <div class="item-wrapper">
            <img src="http://hamagawaortho.com/img/products-icon.png" alt="product">
            <span>current bid</span><span>12</span>
        </div>
    </div>
@endsection