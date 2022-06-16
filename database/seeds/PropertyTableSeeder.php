<?php

use Illuminate\Database\Seeder;

class PropertyTableSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        DB::table( 'properties' )->insert( [

            'id' 					=> 1,
            'added_by'              => 1,
            'title'					=> 'My home',
            'owner_name' 			=> 'Rakib',
            'category'				=> 1,
            'sub_category' 			=> 3,
            'phone'					=> '01992976624',
            'city'					=> 'Kushtia',
            'neighborhood_Name'		=> 'jhfjfa',
            'street_name' 			=> 'Kushtia',
            'building_no'			=> '8960',
            'age'					=> '8',
            'direction'				=> 'jdfhjkfd',
            'number_of_street'		=> 'jdfhjkfd',
            'district'				=> 'Dhaka',
            'to_be_used'			=> 'Dhaka',
            'size'					=> '465',
            'Price'					=> '465',
            'original_price'		=> '465',
            'image'					=> 'uhaerjhkgfrlka.png',
            'brochure'				=> 'uhaerjhkgfrlka.pdf',
            'status'				=> 1,
            'description'			=> 'This is Home',
        ] );

        DB::table( 'properties' )->insert( [

            'id' 					=> 2,
            'added_by'              => 1,
            'title'					=> 'My home',
            'owner_name' 			=> 'Rakib',
            'category'				=> 2,
            'sub_category' 			=> 4,
            'phone'					=> '01992976624',
            'city'					=> 'Kushtia',
            'neighborhood_Name'		=> 'jhfjfa',
            'street_name' 			=> 'Kushtia',
            'building_no'			=> '8960',
            'age'					=> '8',
            'direction'				=> 'jdfhjkfd',
            'number_of_street'		=> 'jdfhjkfd',
            'district'				=> 'Dhaka',
            'to_be_used'			=> 'Dhaka',
            'size'					=> '465',
            'Price'					=> '465',
            'original_price'		=> '465',
            'image'					=> 'uhaerjhkgfrlkagf.png',
            'brochure'				=> 'uhaerjhkgfrlka.pdf',
            'status'				=> 0,
            'description'			=> 'This is Home',
        ] );
    }
}
