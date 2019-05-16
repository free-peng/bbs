<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("nodes")->insert([
            ['name' => 'PHP', 'sequence' => 1, 'group_id' => 1, 'alias' => 'php'],
            ['name' => 'JavaScript', 'sequence' => 2, 'group_id' => 1, 'alias' => 'javascript'],
            ['name' => 'C', 'sequence' => 3, 'group_id' => 1, 'alias' => 'c'],
            ['name' => 'Java', 'sequence' => 4, 'group_id' => 1, 'alias' => 'java'],
            ['name' => 'Go', 'sequence' => 5, 'group_id' => 1, 'alias' => 'golang'],
        ]);
    }
}
