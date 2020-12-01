@extends('app')

@section('title', 'Listing')

@section('content')
    <div class="single-item">
        <span>Title : </span> <span> {{ $item->title }}</span>


        <div class="row">

            <div class="col-md-8">
                <img class="img-fluid" src="{{ $item->thumbnail }}" alt="{{ $item->title }}">
            </div>

            <div class="col-md-4">
                <!-- <h3 class="my-3">Project Description</h3> -->
                <p>{{ $item->description }}</p>
                <p><strong>Min Price: {{ $item->min_price }}</strong></p>
                <p><strong>Current Highest Bid: 120</strong></p>

                <form action="/item/bid" method="post" required>
                    <input type="text" class="bid" name="bid" required>
                    <input type="submit" class="submit-bid" value="Bid">
                </form>

            </div>
        </div>


    </div>
@endsection