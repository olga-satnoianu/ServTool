<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DomainsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('domains')->delete();
        
        \DB::table('domains')->insert(array (
            0 => 
            array (
                'id' => 8,
                'user_id' => 3,
                'name' => 'First domain',
                'server_id' => 20,
                'created_at' => '2023-06-24 15:56:12',
                'updated_at' => '2023-06-24 15:56:12',
            ),
            1 => 
            array (
                'id' => 9,
                'user_id' => 3,
                'name' => 'Second domain',
                'server_id' => 21,
                'created_at' => '2023-06-24 15:56:24',
                'updated_at' => '2023-06-24 15:56:48',
            ),
            2 => 
            array (
                'id' => 10,
                'user_id' => 3,
                'name' => 'Third domain',
                'server_id' => NULL,
                'created_at' => '2023-06-24 15:56:41',
                'updated_at' => '2023-06-24 15:56:41',
            ),
        ));
        
        
    }
}