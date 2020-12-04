@extends('app')

@section('title', 'Listing')

@section('content')

    <section>
        <div class="container">
            <div><input type="text" name="term" class="search-box" placeholder="Search"></div>
            <div>
                <select name="sort" class="sort-box">
                    <option value="desc">High to Low</option>
                    <option value="asc">Low to High</option>
                </select>
            </div>
            <div class="row item-gallery">
                <span>Nothing to display</span>
            </div>
        </div>
    </section>
    <div class="pagination-links"></div>

@endsection