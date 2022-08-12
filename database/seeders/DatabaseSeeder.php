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
        $this->call([
            UserSeeder::class,
            ClientSeeder::class,
            PianoSeeder::class,
            SettingsSeeder::class,
        ]);
    }
}
