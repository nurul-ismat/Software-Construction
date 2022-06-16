<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
        	'course_name' 		    => 'SCSJ85943 - 05',
        	'responsible_professor' => '4',
        	'status' 			    => '1'
        ]);
        DB::table('courses')->insert([
        	'course_name' 		    => 'SCSD85945 - 02',
        	'responsible_professor' => '3',
        	'status' 			    => '1'
        ]);
    }
}
