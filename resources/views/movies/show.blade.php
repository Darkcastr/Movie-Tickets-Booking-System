@extends('layouts.app')
@section('content')
<h1>{{ $movie->title }}</h1>
<p>{{ $movie->description }}</p>
<h3>Showtimes</h3>
@foreach($showtimes as $showtime)
    <p>{{ $showtime->start_time }} at {{ $showtime->theater }}</p>
    <a href="/bookings/create/{{ $showtime->id }}" class="btn btn-success">Book Now</a>
@endforeach
@endsection
