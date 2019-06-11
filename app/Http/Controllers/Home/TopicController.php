<?php

namespace App\Http\Controllers\Home;

use App\Models\Collection;
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

        //查看用户是否已点赞
        isset(Auth::user()->id)
            ? $like = Like::where(['user_id' => Auth::user()->id, 'topic_id' => $request->id])->count()
            :  $like = false;

        //查看用户是否已点赞
        isset(Auth::user()->id)
            ? $collection = Collection::where(['user_id' => Auth::user()->id, 'topic_id' => $request->id])->count()
            :  $collection = false;

        return view('home.topic.index',compact('topic', 'like','collection'));
    }

    /**
     * 评论保存
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * 话题点赞
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function like(Request $request)
    {
        $data['topic_id'] = $request->id;
        $data['user_id'] = Auth::user()->id;

        Like::create($data);

        return redirect()->back();
    }

    /**
     * 收藏话题
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function collection(Request $request)
    {
        $collection = new Collection();

        $collection->topic_id = $request->id;
        $collection->user_id = Auth::user()->id;

        $collection->save();

        return redirect()->back();
    }

    /**
     * 评论点赞
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reviewsLike(Request $request)
    {
        $like = Review::query()->findOrFail($request->id);

        $like->likes = $like->likes + 1;

        $like->save();

        return redirect()->back();
    }
}
