<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert([
            [
                'title'=>'非IT专业想学习IT的那些事儿',
                'content'=> '背景描述：之前做销售，现在想报名参加IT技术培训，请教一下各位大神:nerd:
                            1、选择哪一版块入门呢？UI、前端、后端、产品、测试？我也是问朋友，人家介绍这些类型。
                            2、哪些培训学院比较好？北大青鸟，创享学院，博厚？
                            能想到的就这些了:eye_roll:，欢迎社区里的各位大神给出积极建议。',
                'group_id'=> 1,
                'user_id' => 1,
                'pv' => 15
            ],
            [
                'title'=>'请教一个linux命令',
                'content'=> '把文件夹里所有文件和文件夹拷贝到另外一个文件夹用什么命令？',
                'group_id'=> 1,
                'user_id' => 1,
                'pv' => 25
            ]
        ]);
    }
}
