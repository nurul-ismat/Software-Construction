<?php

use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('back_sliders')->insert([
            'position' => 1,
            'is_active' => 1,
            'image' => '5xbRHMlNaILSCHYyub4inCX4GWJhMNL8ASNJ5a8i.png',
            'text1' => '',
            'text2' => '',
        ]);

        DB::table('back_sliders')->insert([
            'position' => 2,
            'is_active' => 1,
            'image' => 'vr8Ov5T3PTCb18vaVpHcRzNZYARwiGVy2WpOzANb.png',
            'text1' => '',
            'text2' => '',
        ]);


        DB::table('back_sliders')->insert([
            'position' => 3,
            'is_active' => 1,
            'image' => '0DQMVKvaP0H5GKOyLgHtDMBEd3cBMpDkGkvdZJqT.png',
            'text1' => '',
            'text2' => '',
        ]);


        DB::table('back_sliders')->insert([
            'position' => 4,
            'is_active' => 1,
            'image' => '0mKZYZb6kiPFyplTk0FuPmgk3w44gFiaDj4ekO8E.png',
            'text1' => '',
            'text2' => '',
        ]);
    }
}
