@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Booking Details</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $booking->showtime->movie->title }}</h5>
            <p class="card-text">
                <strong>Seat:</strong> {{ $booking->seat }}<br>
                <strong>Showtime:</strong> {{ $booking->showtime->start_time }}<br>
                <strong>Theater:</strong> {{ $booking->showtime->theater }}<br>
                <strong>Movie Description:</strong> {{ $booking->showtime->movie->description }}<br>
                <strong>Duration:</strong> {{ $booking->showtime->movie->duration }} minutes
            </p>
            <a href="/my-bookings" class="btn btn-secondary">Back to My Bookings</a>
            <form action="/bookings/{{ $booking->id }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Cancel this booking?')">Cancel Booking</button>
            </form>
        </div>
    </div>
</div>
@endsection
