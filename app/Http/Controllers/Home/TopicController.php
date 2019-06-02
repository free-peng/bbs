<?php

namespace App\Http\Controllers\Home;

use App\Models\Review;
use App\Models\Topics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $article = Topics::query()->findOrFail($request->id);

        dump($request->session()->all());
        $reviews = Review::query()->findOrFail(['topic_id'=>$request->id]);

        return view('home.topic.index',compact('article', 'reviews'));
    }
}
