<?php

use Illuminate\Database\Seeder;

class UserSettingsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usersettings')->insert([
            'id' => 1,
            'new_user_register' => 1,
            'new_user_group' => 5,
            'new_user_status' => 1
        ]);
    }
}
