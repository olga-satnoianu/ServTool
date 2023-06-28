<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DomainOperationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('domain_operations')->delete();
        
        \DB::table('domain_operations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'domain_id' => 1,
                'domain_check_id' => 4,
                'enabled' => 0,
                'created_at' => '2023-06-22 14:28:50',
                'updated_at' => '2023-06-22 19:40:59',
            ),
            1 => 
            array (
                'id' => 2,
                'domain_id' => 1,
                'domain_check_id' => 3,
                'enabled' => 1,
                'created_at' => '2023-06-22 14:28:50',
                'updated_at' => '2023-06-23 12:10:41',
            ),
            2 => 
            array (
                'id' => 3,
                'domain_id' => 1,
                'domain_check_id' => 2,
                'enabled' => 1,
                'created_at' => '2023-06-22 14:28:50',
                'updated_at' => '2023-06-23 12:10:41',
            ),
            3 => 
            array (
                'id' => 4,
                'domain_id' => 1,
                'domain_check_id' => 1,
                'enabled' => 1,
                'created_at' => '2023-06-22 14:28:50',
                'updated_at' => '2023-06-22 20:33:46',
            ),
            4 => 
            array (
                'id' => 5,
                'domain_id' => 2,
                'domain_check_id' => 1,
                'enabled' => 1,
                'created_at' => '2023-06-22 19:02:11',
                'updated_at' => '2023-06-22 20:04:32',
            ),
            5 => 
            array (
                'id' => 6,
                'domain_id' => 2,
                'domain_check_id' => 2,
                'enabled' => 0,
                'created_at' => '2023-06-22 19:02:11',
                'updated_at' => '2023-06-22 20:04:32',
            ),
            6 => 
            array (
                'id' => 7,
                'domain_id' => 2,
                'domain_check_id' => 3,
                'enabled' => 0,
                'created_at' => '2023-06-22 19:02:11',
                'updated_at' => '2023-06-22 19:52:30',
            ),
            7 => 
            array (
                'id' => 8,
                'domain_id' => 2,
                'domain_check_id' => 4,
                'enabled' => 1,
                'created_at' => '2023-06-22 19:02:11',
                'updated_at' => '2023-06-22 20:04:32',
            ),
            8 => 
            array (
                'id' => 9,
                'domain_id' => 3,
                'domain_check_id' => 1,
                'enabled' => 0,
                'created_at' => '2023-06-22 19:06:50',
                'updated_at' => '2023-06-22 20:02:44',
            ),
            9 => 
            array (
                'id' => 10,
                'domain_id' => 3,
                'domain_check_id' => 3,
                'enabled' => 0,
                'created_at' => '2023-06-22 19:06:50',
                'updated_at' => '2023-06-22 20:02:44',
            ),
            10 => 
            array (
                'id' => 11,
                'domain_id' => 3,
                'domain_check_id' => 2,
                'enabled' => 1,
                'created_at' => '2023-06-22 19:06:51',
                'updated_at' => '2023-06-22 20:02:40',
            ),
            11 => 
            array (
                'id' => 12,
                'domain_id' => 3,
                'domain_check_id' => 4,
                'enabled' => 0,
                'created_at' => '2023-06-22 19:06:51',
                'updated_at' => '2023-06-22 20:02:40',
            ),
            12 => 
            array (
                'id' => 13,
                'domain_id' => 4,
                'domain_check_id' => 1,
                'enabled' => 0,
                'created_at' => '2023-06-22 19:11:27',
                'updated_at' => '2023-06-23 12:47:07',
            ),
            13 => 
            array (
                'id' => 14,
                'domain_id' => 4,
                'domain_check_id' => 3,
                'enabled' => 0,
                'created_at' => '2023-06-22 19:11:27',
                'updated_at' => '2023-06-22 20:03:01',
            ),
            14 => 
            array (
                'id' => 15,
                'domain_id' => 4,
                'domain_check_id' => 2,
                'enabled' => 0,
                'created_at' => '2023-06-22 19:11:27',
                'updated_at' => '2023-06-22 20:03:01',
            ),
            15 => 
            array (
                'id' => 16,
                'domain_id' => 4,
                'domain_check_id' => 4,
                'enabled' => 0,
                'created_at' => '2023-06-22 19:11:27',
                'updated_at' => '2023-06-22 20:03:42',
            ),
            16 => 
            array (
                'id' => 17,
                'domain_id' => 5,
                'domain_check_id' => 2,
                'enabled' => 0,
                'created_at' => '2023-06-22 19:11:27',
                'updated_at' => '2023-06-22 19:11:27',
            ),
            17 => 
            array (
                'id' => 18,
                'domain_id' => 5,
                'domain_check_id' => 1,
                'enabled' => 0,
                'created_at' => '2023-06-22 19:11:27',
                'updated_at' => '2023-06-22 19:11:27',
            ),
            18 => 
            array (
                'id' => 19,
                'domain_id' => 5,
                'domain_check_id' => 3,
                'enabled' => 0,
                'created_at' => '2023-06-22 19:11:28',
                'updated_at' => '2023-06-22 19:11:28',
            ),
            19 => 
            array (
                'id' => 20,
                'domain_id' => 5,
                'domain_check_id' => 4,
                'enabled' => 0,
                'created_at' => '2023-06-22 19:11:28',
                'updated_at' => '2023-06-22 19:11:28',
            ),
            20 => 
            array (
                'id' => 21,
                'domain_id' => 6,
                'domain_check_id' => 1,
                'enabled' => 1,
                'created_at' => '2023-06-23 12:43:19',
                'updated_at' => '2023-06-23 12:43:19',
            ),
            21 => 
            array (
                'id' => 22,
                'domain_id' => 6,
                'domain_check_id' => 4,
                'enabled' => 0,
                'created_at' => '2023-06-23 12:43:19',
                'updated_at' => '2023-06-23 12:43:19',
            ),
            22 => 
            array (
                'id' => 23,
                'domain_id' => 6,
                'domain_check_id' => 3,
                'enabled' => 0,
                'created_at' => '2023-06-23 12:43:19',
                'updated_at' => '2023-06-23 12:43:19',
            ),
            23 => 
            array (
                'id' => 24,
                'domain_id' => 6,
                'domain_check_id' => 2,
                'enabled' => 0,
                'created_at' => '2023-06-23 12:43:19',
                'updated_at' => '2023-06-23 12:43:19',
            ),
            24 => 
            array (
                'id' => 25,
                'domain_id' => 7,
                'domain_check_id' => 1,
                'enabled' => 0,
                'created_at' => '2023-06-23 12:43:33',
                'updated_at' => '2023-06-23 12:46:41',
            ),
            25 => 
            array (
                'id' => 26,
                'domain_id' => 7,
                'domain_check_id' => 4,
                'enabled' => 0,
                'created_at' => '2023-06-23 12:43:33',
                'updated_at' => '2023-06-23 12:52:25',
            ),
            26 => 
            array (
                'id' => 27,
                'domain_id' => 7,
                'domain_check_id' => 3,
                'enabled' => 0,
                'created_at' => '2023-06-23 12:43:33',
                'updated_at' => '2023-06-23 12:52:24',
            ),
            27 => 
            array (
                'id' => 28,
                'domain_id' => 7,
                'domain_check_id' => 2,
                'enabled' => 0,
                'created_at' => '2023-06-23 12:43:33',
                'updated_at' => '2023-06-23 12:52:24',
            ),
            28 => 
            array (
                'id' => 29,
                'domain_id' => 8,
                'domain_check_id' => 1,
                'enabled' => 0,
                'created_at' => '2023-06-24 15:56:13',
                'updated_at' => '2023-06-24 15:56:13',
            ),
            29 => 
            array (
                'id' => 30,
                'domain_id' => 8,
                'domain_check_id' => 4,
                'enabled' => 0,
                'created_at' => '2023-06-24 15:56:13',
                'updated_at' => '2023-06-24 15:56:13',
            ),
            30 => 
            array (
                'id' => 31,
                'domain_id' => 8,
                'domain_check_id' => 3,
                'enabled' => 0,
                'created_at' => '2023-06-24 15:56:13',
                'updated_at' => '2023-06-24 15:56:13',
            ),
            31 => 
            array (
                'id' => 32,
                'domain_id' => 8,
                'domain_check_id' => 2,
                'enabled' => 1,
                'created_at' => '2023-06-24 15:56:13',
                'updated_at' => '2023-06-24 15:56:13',
            ),
            32 => 
            array (
                'id' => 33,
                'domain_id' => 9,
                'domain_check_id' => 3,
                'enabled' => 1,
                'created_at' => '2023-06-24 15:56:25',
                'updated_at' => '2023-06-24 15:56:25',
            ),
            33 => 
            array (
                'id' => 34,
                'domain_id' => 9,
                'domain_check_id' => 1,
                'enabled' => 0,
                'created_at' => '2023-06-24 15:56:25',
                'updated_at' => '2023-06-24 15:56:25',
            ),
            34 => 
            array (
                'id' => 35,
                'domain_id' => 9,
                'domain_check_id' => 4,
                'enabled' => 0,
                'created_at' => '2023-06-24 15:56:25',
                'updated_at' => '2023-06-24 15:56:25',
            ),
            35 => 
            array (
                'id' => 36,
                'domain_id' => 9,
                'domain_check_id' => 2,
                'enabled' => 0,
                'created_at' => '2023-06-24 15:56:25',
                'updated_at' => '2023-06-24 15:56:25',
            ),
            36 => 
            array (
                'id' => 37,
                'domain_id' => 10,
                'domain_check_id' => 1,
                'enabled' => 0,
                'created_at' => '2023-06-24 15:56:42',
                'updated_at' => '2023-06-24 16:21:19',
            ),
            37 => 
            array (
                'id' => 38,
                'domain_id' => 10,
                'domain_check_id' => 4,
                'enabled' => 0,
                'created_at' => '2023-06-24 15:56:42',
                'updated_at' => '2023-06-24 16:21:19',
            ),
            38 => 
            array (
                'id' => 39,
                'domain_id' => 10,
                'domain_check_id' => 2,
                'enabled' => 0,
                'created_at' => '2023-06-24 15:56:42',
                'updated_at' => '2023-06-24 16:21:19',
            ),
            39 => 
            array (
                'id' => 40,
                'domain_id' => 10,
                'domain_check_id' => 3,
                'enabled' => 0,
                'created_at' => '2023-06-24 15:56:42',
                'updated_at' => '2023-06-24 16:21:19',
            ),
        ));
        
        
    }
}