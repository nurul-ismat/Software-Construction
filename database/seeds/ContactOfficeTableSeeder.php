<?php

use Illuminate\Database\Seeder;

class ContactOfficeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_offices')->insert([

        	'id' 			=> 1,
        	'name'			=> 'Dhanmondi',
        	'long' 			=> 'hrfuidurfjkslkg',
        	'lat'			=> 'hfrlkfmczudhflk',
        ]);
    }
}
