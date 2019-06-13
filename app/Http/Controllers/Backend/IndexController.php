<?php

namespace App\Http\Controllers\Backend;

use App\Models\Like;
use App\Models\Review;
use App\Models\Topics;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $a = date("Y-m-d",strtotime("-0 day"));
        dump($a);

        $start_time=Carbon::now()->startOfDay();  //今日开始时间
        $end_time=Carbon::now()->endOfDay();       //今日结束时间

        //用户总数和今日注册
        $userCount = User::query()->count();
        $todayUser = User::query()->whereBetween('created_at',[$start_time,$end_time])->count();

        //话题总数和今日发表
        $topicCount = Topics::query()->count();
        $todayTopic= Topics::query()->whereBetween('created_at',[$start_time,$end_time])->count();

        //回复总数和今日回复
        $reviewCount = Review::query()->count();
        $todayReview = Review::query()->whereBetween('created_at',[$start_time, $end_time])->count();

        return view('backend.index', compact('userCount','todayUser','topicCount','todayTopic','reviewCount','todayReview'));
    }

    public function lineChart()
    {
        $topicCount = [];
        for($i=1; $i<=15; $i++) {
            $topicCount[] = Topics::query()
                ->whereBetween('created_at',[date("Y-m-d 00:00:00",strtotime("-$i day")),
                    date("Y-m-d 23:59:59",strtotime("-$i day"))])
                ->count();
        }

        $reviewCount = [];
        for($i=1; $i<=15; $i++) {
            $reviewCount[] = Review::query()
                ->whereBetween('created_at',[date("Y-m-d 00:00:00",strtotime("-$i day")),
                    date("Y-m-d 23:59:59",strtotime("-$i day"))])
                ->count();

        }

        $likeCount = [];
        for($i=1; $i<=15; $i++) {
            $likeCount[] = Like::query()
                ->whereBetween('created_at',[date("Y-m-d 00:00:00",strtotime("-$i day")),
                    date("Y-m-d 23:59:59",strtotime("-$i day"))])
                ->count();

        }

        //获取日期
        $day = [];
        for($i=0; $i<=15; $i++) {
            $day[] = date("Y/m/d",strtotime("-$i day"));
        }

        return response()->json(['topic'=> $topicCount, 'review' => $reviewCount, 'like' => $likeCount, 'day'=>$day]);
//        return ['status'=> 1];
    }
}
