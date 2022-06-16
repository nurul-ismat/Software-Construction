<?php

use Illuminate\Database\Seeder;

class EmailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emailsettings')->insert([
            'id' => 1,
            'mail_drivers' => '',
            'mail_host' => '',
            'mail_port' => '',
            'user_name' => '',
            'password' => '',
            'mail_encryption' => '',
            'mail_address' => '',
            'mail_from_name' => '',
        ]);
    }
}
