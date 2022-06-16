<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'fname' 			=> 'admin',
        	'lname' 			=> 'kitchen',
        	'uname' 			=> 'kitchen',
        	'email' 			=> 'admin@kitchen.com',
            'is_front'			=> 0,
            'user_group'        => 1,
        	'password' 			=> md5('123456'),
        	'mobile'    		=> '',
        	'fax'				=> '',
        	'license'			=> '',
        	'street1' 			=> '',
        	'street2' 			=> '',
        	'city'				=> '',
        	'state' 			=> '',
        	'province'			=> '',
        	'postal_code'		=> '',
        	'country'			=> '',
        	'website'			=> '',
        	'msn'				=> '',
        	'skype'				=> '',
        	'twitter'			=> '',
        	'other'				=> '',
        	'bio'			    => '',
        	'profile_picture'	=> null,
        	'other_information'	=> '',
        	'membership_type'		=> ''
        ]);


        DB::table('users')->insert([
        	'fname' 			=> 'agent',
        	'lname' 			=> 'kitchen',
        	'uname' 			=> 'kitchen2',
        	'email' 			=> 'author@kitchen.com',
            'is_front'			=> 0,
            'user_group'        => 4,
        	'password' 			=> md5('123456'),
        	'mobile'    		=> '',
        	'fax'				=> '',
        	'license'			=> '',
        	'street1' 			=> '',
        	'street2' 			=> '',
        	'city'				=> '',
        	'state' 			=> '',
        	'province'			=> '',
        	'postal_code'		=> '',
        	'country'			=> '',
        	'website'			=> '',
        	'msn'				=> '',
        	'skype'				=> '',
        	'twitter'			=> '',
        	'other'				=> '',
        	'bio'			    => '',
        	'profile_picture'	=> null,
        	'other_information'	=> '',
        	'membership_type'	=> ''
        ]);

		DB::table('users')->insert([
        	'fname' 			=> 'Rakibul',
        	'lname' 			=> 'Islam',
        	'uname' 			=> 'rakib98',
        	'email' 			=> 'rakibulislam@gmail.com',
            'is_front'			=> 0,
            'user_group'        => 1,
        	'password' 			=> md5('123456'),
        	'mobile'    		=> '',
        	'fax'				=> '',
        	'license'			=> '',
        	'street1' 			=> '',
        	'street2' 			=> '',
        	'city'				=> '',
        	'state' 			=> '',
        	'province'			=> '',
        	'postal_code'		=> '',
        	'country'			=> '',
        	'website'			=> '',
        	'msn'				=> '',
        	'skype'				=> '',
        	'twitter'			=> '',
        	'other'				=> '',
        	'bio'			    => '',
        	'profile_picture'	=> null,
        	'other_information'	=> '',
        	'membership_type'	=> ''
        ]);

		DB::table('users')->insert([
        	'fname' 			=> 'Ismat',
        	'lname' 			=> 'Tanni',
        	'uname' 			=> 'ismat98',
        	'email' 			=> 'ismat@gmail.com',
            'is_front'			=> 0,
            'user_group'        => 1,
        	'password' 			=> md5('123456'),
        	'mobile'    		=> '',
        	'fax'				=> '',
        	'license'			=> '',
        	'street1' 			=> '',
        	'street2' 			=> '',
        	'city'				=> '',
        	'state' 			=> '',
        	'province'			=> '',
        	'postal_code'		=> '',
        	'country'			=> '',
        	'website'			=> '',
        	'msn'				=> '',
        	'skype'				=> '',
        	'twitter'			=> '',
        	'other'				=> '',
        	'bio'			    => '',
        	'profile_picture'	=> null,
        	'other_information'	=> '',
        	'membership_type'	=> ''
        ]);
    }
}
