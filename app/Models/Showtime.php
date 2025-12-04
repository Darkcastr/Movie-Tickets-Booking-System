<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    protected $fillable = ['movie_id', 'start_time', 'theater'];
    public function movie() { return $this->belongsTo(Movie::class); }
    public function bookings() { return $this->hasMany(Booking::class); }
}
