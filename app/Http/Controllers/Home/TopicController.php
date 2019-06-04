<?php

namespace App\Http\Controllers\Home;

use App\Models\Like;
use App\Models\Review;
use App\Models\Topics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        //话题内容
        $topic = Topics::query()->findOrFail($request->id);
        //文章点击次数统计
        $topic->pv = $topic->pv + 1;
        $topic->save();

        //评论内容
        $reviews = Review::where('topic_id', $request->id)->get();

        //查询用户是否点赞
        $like = Like::where(['user_id'=>Auth::user()->id, 'topic_id'=>$request->id])->count();

        //查询总共点赞条数
        $likes = Like::where('topic_id', $request->id)->count();

        return view('home.topic.index',compact('topic', 'reviews', 'like', 'likes'));
    }

    //评论保存
    public function reviewSave(Request $request)
    {
        $rules = [
          'content' => 'required'
        ];

        $message = [
            'content.required' => '内容不能为空！'
        ];

        $request->validate($rules, $message);

        $data['user_id'] = Auth::user()->id;

        $review = new Review;
        $review->fill(array_merge($data, $request->all()));
        $review->save();

        return redirect()->back();
    }

    public function like(Request $request)
    {
        $data['topic_id'] = $request->id;
        $data['user_id'] = Auth::user()->id;

        Like::create($data);

        return redirect()->back();
    }
}
