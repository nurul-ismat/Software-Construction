<?php

use Illuminate\Database\Seeder;

class OfficesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table( 'contact_offices' )->insert( [

            'name' 		=> 'Riadh',
            'long' 		=> '46.77978515624999',
            'lat' 		=> '24.647017162630366'
        ] );

       DB::table( 'contact_offices' )->insert( [

            'name' 		=> 'Jeddah',
            'long' 		=> '39.1607666015625',
            'lat' 		=> '21.59104293572423'
        ] );

       DB::table( 'contact_offices' )->insert( [

            'name' 		=> 'Dammam',
            'long' 		=> '50.09971618652344',
            'lat' 		=> '26.43184293282943'
        ] );
    }
}
