<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\Home\ReleaseRequest;
use App\Models\Attention;
use App\Models\Collection;
use App\Models\Like;
use App\Models\NodeGroup;
use App\Models\Review;
use App\Models\Topics;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //查询出当前用户所发表的文章
        $topics = Topics::where('user_id',$request->id)->paginate();

        return view('home.info.index', compact('topics'));
    }

    /**
     * 他人点赞或者我的点赞
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function like(Request $request)
    {
        $likes = Like::query()->where('user_id', $request->id)->paginate();

        return view('home.info.like', compact('likes'));

    }

    /**
     * 我的或者他的回复
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function comments(Request $request)
    {
        $comments = Review::query()->where('user_id', $request->id)->paginate();

        return view('home.info.comments', compact('comments'));

    }

    /**
     * 实现关注用户
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function attention(Request $request)
    {
        $attention = new Attention();

        $data['user_id'] = Auth::user()->id;
        $data['attention_user_id'] = $request->id;

        $attention->create($data);

        return redirect()->back();
    }

    /**
     * 取消关注
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAttention(Request $request)
    {
        $delete = Attention::query()->where(['user_id'=>Auth::user()->id, 'attention_user_id'=>$request->id]);

        $delete->delete();

        return redirect()->back();
    }

    /**
     * 查询出他的关注或者我的关注
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function following(Request $request)
    {
        $followings = Attention::query()->where('user_id', $request->id)->get();

        return view('home.info.attention', compact('followings'));
    }

    /**
     * 我的或者他的粉丝
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function followers(Request $request)
    {
        $followers = Attention::query()->where('attention_user_id', $request->id)->get();

        return view('home.info.followers', compact('followers'));
    }

    /**
     * 查询出我的收藏或者他的收藏
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function collection(Request $request)
    {
        $collections = Collection::query()->where('user_id', $request->id)->paginate();

        return view('home.info.collection', compact('collections'));
    }



    /**
     * 文章编辑
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $topic = Topics::query()->user()->findOrFail($request->id);

        $nodeGroups = NodeGroup::all();

        return view('home.info.edit', compact('topic', 'nodeGroups'));
    }

    /**
     * 用户编辑话题保存
     * @param ReleaseRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(ReleaseRequest $request)
    {
        $topic = Topics::query()->user()->findOrFail($request->id);

        $topic->fill($request->only(['title', 'node_id', 'content']));

        $topic->save();

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        Topics::query()->user()->destroy($request->id);

        return redirect()->back();
    }
}
