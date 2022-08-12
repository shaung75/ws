<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use App\Models\Piano;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PianoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
