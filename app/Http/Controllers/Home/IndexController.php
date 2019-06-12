<?php

namespace App\Http\Controllers\Home;

use App\Models\Link;
use App\Models\NodeGroup;
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
            ->when($request->tab == 'following', function($query) use($request) {
                return $query->orderBy('pv', 'desc');
            })
            ->paginate();

        if ($request->tab == 'following') {
            $topics = Topics::query()->select()->join('attentions',function($query) {
                $query->on('attentions.attention_user_id', 'topics.user_id')->where('attentions.user_id', Auth::id());
            })->paginate();
        }

        return view("home.index", compact('topics'));
    }

    public function interest()
    {
        $nodeGroups = NodeGroup::all();

        return view('home.interest', compact('nodeGroups'));
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
