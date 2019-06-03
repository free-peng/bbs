<?php

namespace App\Http\Controllers\Home;

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
        $topic = Topics::query()->findOrFail($request->id);

        $reviews = Review::where('topic_id', $request->id)->get();

        return view('home.topic.index',compact('topic', 'reviews'));
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
}
