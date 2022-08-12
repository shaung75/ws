<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
