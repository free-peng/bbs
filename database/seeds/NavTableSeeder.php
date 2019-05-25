<?php

use Illuminate\Database\Seeder;

class NavTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nav')->insert([
            ['name'=>'首页', 'url'=>'/', 'sequence'=>1],
            ['name'=>'节点', 'url'=>'/node', 'sequence'=>2],
            ['name'=>'成员', 'url'=>'', 'sequence'=>3],
            ['name'=>'广告投放', 'url'=>'', 'sequence'=>3]
        ]);

    }
}
