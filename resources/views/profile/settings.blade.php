@extends('app')

@section('title', 'Settings')

@section('content')
    <div class="single-item">
        <span>Available Creids : 100</span>

        <form action="/profile/autobid/bid" method="post" required>
            <input type="max_bid">
        </form>

    </div>
@endsection