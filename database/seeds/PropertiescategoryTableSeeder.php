<?php

use Illuminate\Database\Seeder;

class PropertiescategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('propertiescategories')->insert([

        	'propertiescategories_id' => 100000,
        	'name'					  => 'Uncategorized'
        ]);

        DB::table('propertiescategories')->insert([

        	'propertiescategories_id' => 1,
        	'name'					  => 'Rent'
        ]);

        DB::table('propertiescategories')->insert([

        	'propertiescategories_id' => 2,
        	'name'					  => 'Sale'
        ]);

        DB::table('propertiescategories')->insert([

        	'propertiescategories_id' => 3,
        	'name'					  => 'Lands',
        	'category_id'			  => 1
        ]);

        DB::table('propertiescategories')->insert([

        	'propertiescategories_id' => 4,
        	'name'					  => 'Lands',
        	'category_id'			  => 2
        ]);

        DB::table('propertiescategories')->insert([

        	'propertiescategories_id' => 5,
        	'name'					  => 'Buldings',
        	'category_id'			  => 2
        ]);

        DB::table('propertiescategories')->insert([

        	'propertiescategories_id' => 6,
        	'name'					  => 'Villas',
        	'category_id'			  => 2
        ]);

        DB::table('propertiescategories')->insert([

        	'propertiescategories_id' => 7,
        	'name'					  => 'Apartments',
        	'category_id'			  => 2
        ]);

        DB::table('propertiescategories')->insert([

        	'propertiescategories_id' => 8,
        	'name'					  => 'Farms',
        	'category_id'			  => 2
        ]);

        DB::table('propertiescategories')->insert([

        	'propertiescategories_id' => 9,
        	'name'					  => 'Other Properties',
        	'category_id'			  => 2
        ]);


        DB::table('propertiescategories')->insert([

            'propertiescategories_id' => 10,
            'name'                    => 'Buldings',
            'category_id'             => 1
        ]);

        DB::table('propertiescategories')->insert([

            'propertiescategories_id' => 11,
            'name'                    => 'Villas',
            'category_id'             => 1
        ]);

        DB::table('propertiescategories')->insert([

            'propertiescategories_id' => 12,
            'name'                    => 'Floors',
            'category_id'             => 1
        ]);

        DB::table('propertiescategories')->insert([

            'propertiescategories_id' => 13,
            'name'                    => 'Apartments',
            'category_id'             => 1
        ]);

        DB::table('propertiescategories')->insert([

            'propertiescategories_id' => 14,
            'name'                    => 'Storesand Offices',
            'category_id'             => 1
        ]);

        DB::table('propertiescategories')->insert([

            'propertiescategories_id' => 15,
            'name'                    => 'Farms',
            'category_id'             => 1
        ]);

        DB::table('propertiescategories')->insert([

            'propertiescategories_id' => 16,
            'name'                    => 'Other Properties',
            'category_id'             => 1
        ]);
    }
}
