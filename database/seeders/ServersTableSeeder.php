<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('servers')->delete();
        
        \DB::table('servers')->insert(array (
            0 => 
            array (
                'id' => 20,
                'user_id' => 3,
                'ip' => '127.0.0.1',
                'name' => 'First server',
                'created_at' => '2023-06-24 15:53:58',
                'updated_at' => '2023-06-24 15:53:58',
            ),
            1 => 
            array (
                'id' => 21,
                'user_id' => 3,
                'ip' => '185.137.135.229',
                'name' => 'Second server',
                'created_at' => '2023-06-24 15:54:19',
                'updated_at' => '2023-06-24 15:54:19',
            ),
        ));
        
        
    }
}