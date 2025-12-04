<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Showtime;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Existing movie and showtime
        Movie::create(['title' => 'Inception', 'description' => 'Mind-bending thriller', 'duration' => 148]);
        Showtime::create(['movie_id' => 1, 'start_time' => now()->addHours(2), 'theater' => 'Main Theater']);

        // Add more movies
        Movie::create(['title' => 'The Dark Knight', 'description' => 'Batman faces the Joker in Gotham City.', 'duration' => 152]);
        Movie::create(['title' => 'Pulp Fiction', 'description' => 'Non-linear stories of crime and redemption.', 'duration' => 154]);
        Movie::create(['title' => 'Avatar', 'description' => 'A marine on an alien planet.', 'duration' => 162]);
        Movie::create(['title' => 'Titanic', 'description' => 'A tragic love story on the ill-fated ship.', 'duration' => 195]);

        // Add more showtimes (link to new movies)
        Showtime::create(['movie_id' => 2, 'start_time' => now()->addHours(4), 'theater' => 'VIP Theater']);
        Showtime::create(['movie_id' => 3, 'start_time' => now()->addHours(6), 'theater' => 'Main Theater']);
        Showtime::create(['movie_id' => 4, 'start_time' => now()->addHours(8), 'theater' => 'IMAX Theater']);
}
}
