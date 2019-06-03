<?php

namespace App\Http\Controllers\Home;

use App\Models\Topics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InfoController extends Controller
{
    public function index()
    {
        //查询出当前用户所发表的文章
        $topics = Topics::where('user_id',Auth::user()->id)->get();

        return view('home.info.index', compact('topics'));
    }

    public function like()
    {
        return view('home.info.like');
    }
}
