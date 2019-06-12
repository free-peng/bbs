<?php

namespace App\Http\Controllers\Backend;

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
        
    }
}
