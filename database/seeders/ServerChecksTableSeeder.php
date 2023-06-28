<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServerChecksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('server_checks')->delete();
        
        \DB::table('server_checks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Ping IP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Check 80',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Check 443',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Check 22',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}