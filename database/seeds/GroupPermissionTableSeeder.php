<?php

use Illuminate\Database\Seeder;

class GroupPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $no_of_module = 25;
        $no_of_permission = 4;

        for($i = 1; $i<= $no_of_module; $i++){
            for($j=1; $j<=$no_of_permission; $j++){

                DB::table('grouppermissions')->insert([
                    'group_id' => 1,
                    'module_id' => $i,
                    'permission_id' => $j,
                ]);

                DB::table('grouppermissions')->insert([
                    'group_id' => 4,
                    'module_id' => $i,
                    'permission_id' => $j,
                ]);

            }
        }

        for($i = 1; $i<= $no_of_module; $i += 1){
            for($j=1; $j<=$no_of_permission; $j += 2){

                DB::table('grouppermissions')->insert([
                    'group_id' => 2,
                    'module_id' => $i,
                    'permission_id' => $j,
                ]);

            }
        }

        for($i = 1; $i<= $no_of_module; $i += 2){
            for($j=1; $j<=$no_of_permission; $j += 2){

                DB::table('grouppermissions')->insert([
                    'group_id' => 3,
                    'module_id' => $i,
                    'permission_id' => $j,
                ]);

            }
        }




    }
}
