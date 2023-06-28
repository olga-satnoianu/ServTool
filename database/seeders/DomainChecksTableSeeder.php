<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DomainChecksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('domain_checks')->delete();
        
        \DB::table('domain_checks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Ping',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Check HTTP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Check HTTPS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Validate SSL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}