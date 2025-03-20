<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ahairwe Jordan',
            'email' => 'jordankatetegirwe@gmail.com',
            'password' => Hash::make('password'),
            'job_title' => "Software Engineer",
            'freelance' => true,
            'degree' => "Bachelor",
            'city' => 'Kampala, Uganda',
            'phone_number' => "+256 750 084912",
            'date_of_birth' => Carbon::parse("2000/5/31"),
            'facebook' => "https://www.facebook.com/jordanholly962/",
            'instagram' => "https://www.instagram.com/sdjholly_1/",
            'twitter' => "https://x.com/SdjHolly",
            'linkedin' => "https://www.linkedin.com/in/gp10dev/",
            'github' => "https://github.com/GP10DevHTS",
        ]);
    }
}
