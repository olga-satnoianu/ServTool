<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GuidesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('guides')->delete();

        \DB::table('guides')->insert(array (
            0 =>
            array (
                'id' => 1,
                'major_event_id' => 6,
                'title' => 'Resolve domain http check 500 Error',
                'description' => 'Verify webserver error log and talk to the site assigned team/ Restart service/ Verify firewall',
                'created_at' => '2023-06-24 19:35:35',
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'major_event_id' => 7,
                'title' => 'Resolve domain https check 500 Error',
                'description' => 'Verify webserver error log and talk to the site assigned team/ Restart service/ Verify firewall',
                'created_at' => '2023-06-24 19:35:35',
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'major_event_id' => 1,
                'title' => 'Resolve server 80 check 500 Error',
                'description' => 'Verify webserver error log and talk to the site assigned team/ Restart service/ Verify firewall',
                'created_at' => '2023-06-24 19:35:35',
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'major_event_id' => 2,
                'title' => 'Resolve server 443 check 500 Error',
                'description' => 'Verify webserver error log and talk to the site assigned team/ Restart service/ Verify firewall',
                'created_at' => '2023-06-24 19:35:35',
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'major_event_id' => 4,
                'title' => 'Resolve server ip ping check',
                'description' => 'The server is most probably offline.',
                'created_at' => '2023-06-24 19:35:35',
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'major_event_id' => 5,
                'title' => 'Resolve domain ping check',
                'description' => '',
                'created_at' => '2023-06-24 19:35:35',
                'updated_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'major_event_id' => 3,
                'title' => 'Resolve server 22 check',
                'description' => 'The server is most probably offline.',
                'created_at' => '2023-06-24 19:35:35',
                'updated_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'major_event_id' => 8,
                'title' => 'Resolve domain validate ssl',
                'description' => '',
                'created_at' => '2023-06-24 19:35:35',
                'updated_at' => NULL,
            ),
            8 =>
                array (
                    'id' => 9,
                    'major_event_id' => 9,
                    'title' => 'Resolve domain http check 503 Error',
                    'description' => 'Verify web services/ Restart service/ Verify firewall',
                    'created_at' => '2023-06-24 19:35:35',
                    'updated_at' => NULL,
                ),
            9 =>
                array (
                    'id' => 10,
                    'major_event_id' => 10,
                    'title' => 'Resolve domain https check 503 Error',
                    'description' => 'Verify web services/ Restart service/ Verify firewall',
                    'created_at' => '2023-06-24 19:35:35',
                    'updated_at' => NULL,
                ),
            10 =>
                array (
                    'id' => 11,
                    'major_event_id' => 11,
                    'title' => 'Resolve server 80 check 503 Error',
                    'description' => 'Verify web services/ Restart service/ Verify firewall',
                    'created_at' => '2023-06-24 19:35:35',
                    'updated_at' => NULL,
                ),
            11 =>
                array (
                    'id' => 12,
                    'major_event_id' => 12,
                    'title' => 'Resolve server 443 check 503 Error',
                    'description' => 'Verify web services/ Restart service/ Verify firewall',
                    'created_at' => '2023-06-24 19:35:35',
                    'updated_at' => NULL,
                ),
            13 =>
                array (
                    'id' => 13,
                    'major_event_id' => 13,
                    'title' => 'Resolve server 80 check',
                    'description' => 'Restart service/ Verify firewall',
                    'created_at' => '2023-06-24 19:35:35',
                    'updated_at' => NULL,
                ),
            14 =>
                array (
                    'id' => 14,
                    'major_event_id' => 14,
                    'title' => 'Resolve server 443 check',
                    'description' => 'Restart service/ Verify firewall',
                    'created_at' => '2023-06-24 19:35:35',
                    'updated_at' => NULL,
                ),
            15 =>
                array (
                    'id' => 15,
                    'major_event_id' => 15,
                    'title' => 'Resolve domain http check',
                    'description' => 'Restart service/ Verify firewall',
                    'created_at' => '2023-06-24 19:35:35',
                    'updated_at' => NULL,
                ),
            16 =>
                array (
                    'id' => 16,
                    'major_event_id' => 16,
                    'title' => 'Resolve domain https check',
                    'description' => 'Restart service/ Verify firewall',
                    'created_at' => '2023-06-24 19:35:35',
                    'updated_at' => NULL,
                ),
        ));


    }
}
