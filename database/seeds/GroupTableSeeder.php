<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'id' => 1,
            'group_name' => 'developer'
        ]);

        DB::table('groups')->insert([
            'id' => 2,
            'group_name' => 'superadmin'
        ]);

        DB::table('groups')->insert([
            'id' => 3,
            'group_name' => 'admin'
        ]);

        DB::table('groups')->insert([
            'id' => 4,
            'group_name' => 'agent'
        ]);

        DB::table('groups')->insert([
            'id' => 5,
            'group_name' => 'author'
        ]);
    }
}
