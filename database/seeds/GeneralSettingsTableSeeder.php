<?php

use Illuminate\Database\Seeder;

class GeneralSettingsTableSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        DB::table( 'general_settings' )->insert( [
            'id'            => 1,
            'site_name'     => 'UTM',
            'site_title'    => 'UTM Course Management System',
            'site_logo'     => '9Iqy1Q7KiOv6T9ZePmzUrVbjcNtTfLLhGjdjrCEQ.png',
            'footer_text'   => "Copyright © 2022 UTM Course Management System - All Rights Reserved.",
            'footer_text_ar'=> "Copyright © 2022 UTM Course Management System - All Rights Reserved." 
        ] );
    }
}
