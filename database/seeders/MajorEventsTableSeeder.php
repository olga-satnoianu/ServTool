<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MajorEventsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('major_events')->delete();

        \DB::table('major_events')->insert(array (
            0 =>
            array (
                'id' => 1,
                'guide_id' => 3,
                'title' => 'Server Check 80 Failed 500 Error',
                'description' => NULL,
                'trigger_reason' => '80 OUT',
                'created_at' => '2023-06-22 22:12:44',
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'guide_id' => 4,
                'title' => 'Server Check 443 Failed 500 Error',
                'description' => NULL,
                'trigger_reason' => '443 OUT',
                'created_at' => '2023-06-22 22:12:44',
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'guide_id' => 7,
                'title' => 'Server Check 22 Failed',
                'description' => NULL,
                'trigger_reason' => '22 OUT',
                'created_at' => '2023-06-22 22:12:44',
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'guide_id' => 5,
                'title' => 'Server Ping IP Failed',
                'description' => NULL,
                'trigger_reason' => 'PING IP OUT',
                'created_at' => '2023-06-22 22:12:44',
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'guide_id' => 6,
                'title' => 'Domain Ping Failed',
                'description' => NULL,
                'trigger_reason' => 'PING OUT',
                'created_at' => '2023-06-22 22:12:44',
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'guide_id' => 1,
                'title' => 'Domain Check HTTP Failed 500 Error',
                'description' => NULL,
                'trigger_reason' => 'HTTP OUT 500',
                'created_at' => '2023-06-22 22:12:44',
                'updated_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'guide_id' => 2,
                'title' => 'Domain Check HTTPS Failed 500 Error',
                'description' => NULL,
                'trigger_reason' => 'HTTPS OUT',
                'created_at' => '2023-06-22 22:12:44',
                'updated_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'guide_id' => 8,
                'title' => 'Domain Validate SSL Failed',
                'description' => NULL,
                'trigger_reason' => 'SSL OUT',
                'created_at' => '2023-06-22 22:12:44',
                'updated_at' => NULL,
            ),
            8 =>
            array (
                'id' => 9,
                'guide_id' => 9,
                'title' => 'Domain Check HTTP Failed 503 Error',
                'description' => NULL,
                'trigger_reason' => 'HTTP OUT 503',
                'created_at' => '2023-06-22 22:12:44',
                'updated_at' => NULL,
            ),
            9 =>
            array (
                'id' => 10,
                'guide_id' => 10,
                'title' => 'Domain Check HTTPS Failed 503 Error',
                'description' => NULL,
                'trigger_reason' => 'HTTPS OUT 503',
                'created_at' => '2023-06-22 22:12:44',
                'updated_at' => NULL,
            ),
            10 =>
                array (
                    'id' => 11,
                    'guide_id' => 11,
                    'title' => 'Server Check 80 Failed 503 Error',
                    'description' => NULL,
                    'trigger_reason' => '80 OUT 503',
                    'created_at' => '2023-06-22 22:12:44',
                    'updated_at' => NULL,
                ),
            11 =>
                array (
                    'id' => 12,
                    'guide_id' => 12,
                    'title' => 'Server Check 443 Failed 503 Error',
                    'description' => NULL,
                    'trigger_reason' => '443 OUT 503',
                    'created_at' => '2023-06-22 22:12:44',
                    'updated_at' => NULL,
                ),
            13 =>
                array (
                    'id' => 13,
                    'guide_id' => 13,
                    'title' => 'Server Check',
                    'description' => NULL,
                    'trigger_reason' => '80 OUT',
                    'created_at' => '2023-06-22 22:12:44',
                    'updated_at' => NULL,
                ),
            14 =>
                array (
                    'id' => 14,
                    'guide_id' => 14,
                    'title' => 'Server Check',
                    'description' => NULL,
                    'trigger_reason' => '443 OUT',
                    'created_at' => '2023-06-22 22:12:44',
                    'updated_at' => NULL,
                ),
            15 =>
                array (
                    'id' => 15,
                    'guide_id' => 15,
                    'title' => 'Domain Check HTTP Failed',
                    'description' => NULL,
                    'trigger_reason' => 'HTTP OUT',
                    'created_at' => '2023-06-22 22:12:44',
                    'updated_at' => NULL,
                ),
            16 =>
                array (
                    'id' => 16,
                    'guide_id' => 16,
                    'title' => 'Domain Check HTTPS Failed',
                    'description' => NULL,
                    'trigger_reason' => 'HTTPS OUT',
                    'created_at' => '2023-06-22 22:12:44',
                    'updated_at' => NULL,
                ),
        ));


    }
}
