<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             NodeGroupsTableSeeder::class,
             NodesTableSeeder::class,
             NavTableSeeder::class,
             TopicsTableSeeder::class,
             UsersTableSeeder::class,
             ReviewTableSeeder::class,
         ]);
    }
}
