<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\Home\ReleaseRequest;
use App\Models\NodeGroup;
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
