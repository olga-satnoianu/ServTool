<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tasks')->delete();
        
        \DB::table('tasks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'title' => 'Daily maintenance',
                'description' => 'Start your work day with ServTool checks!',
                'time_cicle' => 1,
                'time_unit' => 'Days',
                'created_at' => '2023-06-24 23:05:23',
                'updated_at' => '2023-06-24 23:05:23',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'title' => 'Active infrastructure monitoring',
                'description' => 'Monitor your domains and servers using ServTool!',
                'time_cicle' => 1,
                'time_unit' => 'Days',
                'created_at' => '2023-06-24 23:03:02',
                'updated_at' => '2023-06-24 23:03:02',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'title' => 'Infrastructure updates',
                'description' => 'Check your services and operation systems for new updates!',
                'time_cicle' => 1,
                'time_unit' => 'Days',
                'created_at' => '2023-06-24 23:03:02',
                'updated_at' => '2023-06-24 23:03:02',
            ),
        ));
        
        
    }
}