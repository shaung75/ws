<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
