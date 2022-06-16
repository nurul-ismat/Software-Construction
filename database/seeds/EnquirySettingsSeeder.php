<?php

use Illuminate\Database\Seeder;

class EnquirySettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enquiry_settings')->insert([
            'email' => 'testmail@mail.com'
        ]);
    }
}
