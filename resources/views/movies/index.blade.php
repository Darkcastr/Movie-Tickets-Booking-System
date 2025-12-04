@extends('layouts.app')
@section('content')
<style>
    .card {
        background: rgba(0, 0, 0, 0.8) !important;
        color: #fff !important;
    }
    .card-body h5, .card-body p {
        color: #fff !important;
    }
</style>
<h1>Movies</h1>
@foreach($movies as $movie)
    <div class="card mb-3">
        <div class="card-body">
            <h5>{{ $movie->title }}</h5>
            <p>{{ $movie->description }}</p>
            <a href="/movies/{{ $movie->id }}" class="btn btn-primary">View Showtimes</a>
        </div>
    </div>
@endforeach
@endsection
