<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(GroupPermissionTableSeeder::class);
        $this->call(EmailTableSeeder::class);
        $this->call(UserSettingsTable::class);
        $this->call(GeneralSettingsTableSeeder::class);
        $this->call(ContactSettingSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(EnquirySettingsSeeder::class);
        $this->call(PropertiescategoryTableSeeder::class);
        $this->call(PropertyTableSeeder::class);
        $this->call(OfficesTableSeeder::class);
        $this->call(ProperLocationSeeder::class);
        $this->call(ShowReqSeeder::class);
        $this->call(CourseTableSeeder::class);
    }
}
