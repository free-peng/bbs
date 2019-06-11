<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\Home\ReleaseRequest;
use App\Models\Attention;
use App\Models\Like;
use App\Models\NodeGroup;
use App\Models\Review;
use App\Models\Topics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InfoController extends Controller
{
    public function index(Request $request)
    {
        $meOrHe = Auth::user()->id == $request->id ? '我' : '他';
        $id = $request->id;

        //查询出当前用户所发表的文章
        $topics = Topics::where('user_id',Auth::user()->id)->paginate();

        return view('home.info.index', compact('topics','meOrHe','id'));
    }

    /**
     * 他人点赞或者我的点赞
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function like(Request $request)
    {
        $id = $request->id;
        $meOrHe = Auth::user()->id == $request->id ? '我' : '他';

        $likes = Like::query()->where('user_id', $request->id)->paginate();
        return view('home.info.like', compact('likes','meOrHe','id'));

    }

    /**
     * 我的或者他的回复
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function comments(Request $request)
    {
        $id = $request->id;
        $meOrHe = Auth::user()->id == $request->id ? '我' : '他';

        $comments = Review::query()->where('user_id', $request->id)->paginate();
        return view('home.info.comments', compact('comments','meOrHe','id'));

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
     * 查询出他的关注或者我的关注
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function following(Request $request)
    {
        $id = $request->id;
        $meOrHe = Auth::user()->id == $request->id ? '我' : '他';

        $followings = Attention::query()->where('user_id', $request->id)->get();

        return view('home.info.attention', compact('followings','meOrHe','id'));
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
