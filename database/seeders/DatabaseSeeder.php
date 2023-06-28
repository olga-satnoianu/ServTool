<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DomainsTableSeeder::class);
        $this->call(ServersTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(ServerChecksTableSeeder::class);
        $this->call(DomainChecksTableSeeder::class);
        $this->call(DomainOperationsTableSeeder::class);
        $this->call(OperationServersTableSeeder::class);
        $this->call(MajorEventsTableSeeder::class);
        $this->call(GuidesTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
    }
}
