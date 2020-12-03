@extends('app')

@section('title', 'Settings')

@section('content')
    <div class="single-item">
        {{--<span>Available Creids : 100</span>--}}

        <form action="/profile/autobid/config" method="post" required>
            @csrf
            <input type="number" name="max_bid" placeholder="Maximum bidding amount"
                @if(isset($setting))
                    value="{{ old('setting', $setting->max_bid_amount) }}"
                @endif
            >
            <input type="submit" name="save" value="Save">
        </form>

    </div>
@endsection