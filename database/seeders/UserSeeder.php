<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Shaun Gill',
            'email' => 'shaung75@gmail.com',
            'password' => '$2a$12$wmcxKFckCy7F/AN4BB2Ec.ewNZllJKC/t3HHb9NWKX7nqsk5ClSLG',
            'email_verified_at' => now(),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Luke Winter',
            'email' => 'enquiries@wspianos.co.uk',
            'password' => '$2a$12$wmcxKFckCy7F/AN4BB2Ec.ewNZllJKC/t3HHb9NWKX7nqsk5ClSLG',
            'email_verified_at' => now(),
        ]);
    }
}
