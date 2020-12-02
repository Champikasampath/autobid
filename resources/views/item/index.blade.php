@extends('app')

@section('title', 'Listing')

@section('content')

    <section>
        <div class="container">
            <div><input type="text" name="term" class="search-box" placeholder="Search"></div>
            <div>
                <select name="sort" class="sort-box">
                    <option value="asc">Low to High</option>
                    <option value="desc">High to Low</option>
                </select>
            </div>
            <div class="row item-gallery">
                <span>Nothing to display</span>
            </div>
        </div>
    </section>
    <div class="pagination-links"></div>
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>

@endsection