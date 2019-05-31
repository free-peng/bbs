<?php

use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            [
                'user_id' => 1,
                'topic_id' => 1,
                'content' => '好好好'
            ]
        ]);
    }
}
