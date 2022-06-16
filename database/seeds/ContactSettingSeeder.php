<?php

use Illuminate\Database\Seeder;

class ContactSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_settings')->insert([
            'email'     => 'am1_albijadL@hotmail.com',
            'phone'     => '920002313',
            'phone_ar'  => '545434',
            'address'   => 'Saudi Arabia (Riyadh / Jeddah / Dammam)
            The United Arab Emirates (Ajman)',
            'facebook'  => 'https://www.facebook.com/people/Albijadi-Ahmade/100002363225183',
            'twitter'   => 'https://twitter.com/albijadyg',
            'instagram' => 'https://www.instagram.com/albijady/',
            'linkedin'  => 'https://www.linkedin.com',
            'skype'     => 'https://www.skype.com',
            'youtube'   => 'https://www.youtube.com',
        ]);
    }
}
