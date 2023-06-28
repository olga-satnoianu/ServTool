<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OperationServersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('operation_servers')->delete();
        
        \DB::table('operation_servers')->insert(array (
            0 => 
            array (
                'id' => 73,
                'server_id' => 20,
                'server_check_id' => 3,
                'enabled' => 0,
                'created_at' => '2023-06-24 15:53:59',
                'updated_at' => '2023-06-24 15:53:59',
            ),
            1 => 
            array (
                'id' => 74,
                'server_id' => 20,
                'server_check_id' => 1,
                'enabled' => 1,
                'created_at' => '2023-06-24 15:53:59',
                'updated_at' => '2023-06-24 15:53:59',
            ),
            2 => 
            array (
                'id' => 75,
                'server_id' => 20,
                'server_check_id' => 2,
                'enabled' => 0,
                'created_at' => '2023-06-24 15:53:59',
                'updated_at' => '2023-06-24 15:53:59',
            ),
            3 => 
            array (
                'id' => 76,
                'server_id' => 20,
                'server_check_id' => 4,
                'enabled' => 0,
                'created_at' => '2023-06-24 15:54:00',
                'updated_at' => '2023-06-24 15:54:00',
            ),
            4 => 
            array (
                'id' => 77,
                'server_id' => 21,
                'server_check_id' => 1,
                'enabled' => 0,
                'created_at' => '2023-06-24 15:54:20',
                'updated_at' => '2023-06-24 16:21:36',
            ),
            5 => 
            array (
                'id' => 78,
                'server_id' => 21,
                'server_check_id' => 2,
                'enabled' => 0,
                'created_at' => '2023-06-24 15:54:20',
                'updated_at' => '2023-06-24 16:21:36',
            ),
            6 => 
            array (
                'id' => 79,
                'server_id' => 21,
                'server_check_id' => 3,
                'enabled' => 0,
                'created_at' => '2023-06-24 15:54:20',
                'updated_at' => '2023-06-24 15:54:20',
            ),
            7 => 
            array (
                'id' => 80,
                'server_id' => 21,
                'server_check_id' => 4,
                'enabled' => 0,
                'created_at' => '2023-06-24 15:54:20',
                'updated_at' => '2023-06-24 15:54:20',
            ),
        ));
        
        
    }
}