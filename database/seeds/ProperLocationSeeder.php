<?php

use Illuminate\Database\Seeder;

class ProperLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('properties_locations')->insert([
        'property_id' => 1,
            'long' => 90.439453125,
            'lat' =>33.7243396617476,
        ]);

        DB::table('properties_locations')->insert([
            'property_id' => 2,
            'long' => 75.439453125,
            'lat' =>33.7243396617476,
        ]);


    }
}
