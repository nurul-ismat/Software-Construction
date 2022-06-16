<?php

use Illuminate\Database\Seeder;

class ShowReqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('show_reqs')->insert([
            'status' => 1,
            'property_id' => 1,
            'client_name' => 'test name client',
            'client_email' => 'example@example.com',
            'client_phone' => '0152456876878',
            'request' => 'Special Request'
        ]);

        DB::table('show_reqs')->insert([
            'status' => 0,
            'property_id' => 1,
            'client_name' => 'client name',
            'client_email' => 'email@gmail.com',
            'client_phone' => '016857453468',
            'request' => 'Special Request or message text'
        ]);

        DB::table('show_reqs')->insert([
            'status' => 0,
            'property_id' => 1,
            'client_name' => 'client',
            'client_email' => 'abc@gmail.com',
            'client_phone' => '01876764578',
            'request' => 'message text'
        ]);

    }
}
