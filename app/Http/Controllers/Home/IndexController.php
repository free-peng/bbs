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
        $topics = Topics::query()
            ->when($request->tab == 'latest', function($query) use($request) {
                return $query->orderBy('created_at', 'desc');
            })
            ->when($request->tab == 'elite', function($query) use($request) {
                return $query->orderBy('pv', 'desc');
            })
            ->paginate();

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
