<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NodeGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("node_groups")->insert([
            "name" => "编程"
        ]);
    }
}
