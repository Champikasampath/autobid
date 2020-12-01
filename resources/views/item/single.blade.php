@extends('app')

@section('title', 'Listing')

@section('content')
    <div class="single-item">
        <img src="{{ $item->thumbnail }}" alt="{{ $item->title }}">
        <span>Title : </span> <span> {{ $item->title }}</span>
        <span> {{ $item->description }}</span>
        <span> {{ $item->min_price }}</span>

        <span>Current Highest Bid : 120</span>

        <form action="/item/bid" method="post" required>
            <input type="text" class="bid" name="bid" required>
            <input type="submit" class="submit-bid" value="Bid">
        </form>

    </div>
@endsection