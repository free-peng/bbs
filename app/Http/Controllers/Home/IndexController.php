<?php

namespace App\Http\Controllers\Home;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Topics;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //查询话题
        $topics = Topics::all();

        //友情链接查询
        $links = Link::query()
            ->where('status', 1)
            ->orderBy('sequence')
            ->limit(10)
            ->get();

        //热门话题
        $popularTopics = Topics::query()
            ->orderBy('pv', 'desc')
            ->limit(10)
            ->get();

        return view("home.index", compact('topics', 'links', 'popularTopics'));
    }

    public function latest()
    {
        return view("home.index");
    }

    public function elite()
    {
        return view("home.index");
    }

}
