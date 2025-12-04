@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Bookings</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($bookings->isEmpty())
        <p>You have no bookings yet. <a href="/movies">Browse movies</a> to book one!</p>
    @else
        <div class="row">
            @foreach($bookings as $booking)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $booking->showtime->movie->title }}</h5>
                            <p class="card-text">
                                <strong>Seat:</strong> {{ $booking->seat }}<br>
                                <strong>Showtime:</strong> {{ $booking->showtime->start_time }}<br>
                                <strong>Movie:</strong> {{ $booking->showtime->movie->description }}
                            </p>
                            <a href="/bookings/{{ $booking->id }}" class="btn btn-info">View Details</a>
                            <form action="/bookings/{{ $booking->id }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Cancel this booking?')">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <a href="/movies" class="btn btn-primary mt-3">Back to Movies</a>
</div>
@endsection
