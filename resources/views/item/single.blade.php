@extends('app')

@section('title', 'Listing')

@section('content')

    @include('parts.model')

    <div class="single-item">
        <span>Title : </span> <span> {{ $item->title }}</span>
        <div class="row">

            <div class="col-md-8">
                <img class="img-fluid" src="{{ $item->thumbnail }}" alt="{{ $item->title }}">
            </div>

            <div class="col-md-4">

                <p>{{ $item->description }}</p>
                <p><strong>Min Price: {{ $item->min_price }}</strong></p>
                <p><strong>Current Highest Bid: {{ $item->highest_bid }}</strong></p>

                <form method="post" id="bidding">
                    <input type="text" class="bid" name="bid" required>
                    <input type="hidden" name="item_id" class="item_id" value="{{ $item->id }}">
                    {{--TODO: replace hardcoded user id--}}
                    <input type="submit" class="submit-bid" value="Bid">
                </form>
                <div class="countdown-timer"></div>
            </div>
        </div>
    </div>
@endsection