<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('modules')->insert([
            'id' => 1,
            'module_name' => 'user'
        ]);

        DB::table('modules')->insert([
            'id' => 2,
            'module_name' => 'group'
        ]);

        DB::table('modules')->insert([
            'id' => 3,
            'module_name' => 'modules'
        ]);

        DB::table('modules')->insert([
            'id' => 4,
            'module_name' => 'log_history'
        ]);

        DB::table('modules')->insert([
            'id' => 5,
            'module_name' => 'general_settings'
        ]);

        DB::table('modules')->insert([
            'id' => 6,
            'module_name' => 'user_settings'
        ]);

        DB::table('modules')->insert([
            'id' => 7,
            'module_name' => 'email_settings'
        ]);

        DB::table('modules')->insert([
            'id' => 8,
            'module_name' => 'page_settings'
        ]);

        DB::table('modules')->insert([
            'id' => 9,
            'module_name' => 'slider'
        ]);

        DB::table('modules')->insert([
            'id' => 10,
            'module_name' => 'image_gallery'
        ]);

        DB::table('modules')->insert([
            'id' => 11,
            'module_name' => 'video_gallery'
        ]);

        DB::table('modules')->insert([
            'id' => 12,
            'module_name' => 'gallery'
        ]);

        DB::table('modules')->insert([
            'id' => 13,
            'module_name' => 'vgallery'
        ]);

        DB::table('modules')->insert([
            'id' => 14,
            'module_name' => 'contact_settings'
        ]);

        DB::table('modules')->insert([
            'id' => 15,
            'module_name' => 'category'
        ]);

        DB::table('modules')->insert([
            'id' => 16,
            'module_name' => 'properties'
        ]);

        DB::table('modules')->insert([
            'id' => 17,
            'module_name' => 'properties_category'
        ]);

         DB::table('modules')->insert([
            'id' => 18,
            'module_name' => 'agent'
        ]);

        DB::table('modules')->insert([
            'id' => 19,
            'module_name' => 'agent_category'
        ]);

        DB::table('modules')->insert([
            'id' => 20,
            'module_name' => 'enquiries'
        ]);

        DB::table('modules')->insert([
            'id' => 21,
            'module_name' => 'show-request'
        ]);

    }
}
