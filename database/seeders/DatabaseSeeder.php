<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Manufacturer;
use App\Models\Piano;
use App\Models\Setting;
use App\Models\Type;
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

        /**
         * Create service types
         */
        Type::factory()->create([
            'type' => 'Initial service'
        ]);
        Type::factory()->create([
            'type' => 'Tuning'
        ]);
        Type::factory()->create([
            'type' => 'Repair'
        ]);

        /**
         * Default settings
         */
        Setting::factory()->create([
            'business_name' => 'White & Sentance',
            'business_address1' => 'The Temple',
            'business_address2' => 'East Gate',
            'business_town' => 'Sleaford',
            'business_county' => 'Lincolnshire',
            'business_postcode' => 'NG34 7DR',
            'business_telephone' => '01529 302037',
            'business_email' => 'enquiries@wspianos.co.uk',
            'tax_rate' => 20,
            'invoice_prefix' => 'WS-'
        ]);
    }
}
