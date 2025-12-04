@extends('layouts.app')
@section('content')
<h1>Book Seats for {{ $showtime->movie->title }}</h1>
<form method="POST" action="/bookings">
    {{ csrf_field() }}
    <input type="hidden" name="showtime_id" value="{{ $showtime->id }}">
    <label>Select Seat:</label>
    <select name="seat" class="form-control">
        @foreach($availableSeats as $seat)
            @if(!in_array($seat, $bookedSeats))
                <option value="{{ $seat }}">{{ $seat }}</option>
            @endif
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary mt-2">Book</button>
</form>
@endsection
