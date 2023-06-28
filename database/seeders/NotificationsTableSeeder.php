<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('notifications')->delete();

        \DB::table('notifications')->insert(array (
            0 =>
            array (
                'id' => 1,
                'user_id' => 3,
                'domain_id' => NULL,
                'server_id' => NULL,
                'task_id' => 1,
                'major_event_id' => NULL,
                'title' => 'Mentenanta',
                'description' => 'Start your work day with ServTool checks!',
                'importance' => NULL,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-06-24 14:10:12',
            ),
        ));


    }
}
