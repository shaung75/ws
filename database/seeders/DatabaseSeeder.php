<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Manufacturer;
use App\Models\Piano;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        /**
         * Add users for Shaun and Luke
         */
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

        /**
         * Populate with fake clients
         */
        Client::factory(65)->create();

        /**
         * Add some manufacturers
         */
        Manufacturer::factory()->create(['manufacturer' => 'Yamaha']);
        Manufacturer::factory()->create(['manufacturer' => 'Weber']);
        Manufacturer::factory()->create(['manufacturer' => 'Steinmayer']);
        Manufacturer::factory()->create(['manufacturer' => 'Clavinova']);
        Manufacturer::factory()->create(['manufacturer' => 'Kawai']);

        /**
         * Add some pianos
         */
        Piano::factory(10)->create();
    }
}
