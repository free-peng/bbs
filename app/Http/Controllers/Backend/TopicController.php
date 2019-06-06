<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Home\ReleaseRequest;
use App\Models\NodeGroup;
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
        $topics = Topics::query()
            ->with(["user", "nodes"])
            ->when($request->filled('name'), function($query) use (&$request) {
                return $query->where('title','like','%'.$request->name.'%');
            })
            ->paginate(10);

        return view('backend.topic.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = Topics::query()->findOrFail($id);

        $nodeGroups = NodeGroup::all();

        return view('backend.topic.edit', compact('topic', 'nodeGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReleaseRequest $request, $id)
    {
        $topic = Topics::query()->findOrFail($id);

        $topic->fill($request->only(['contetn', 'node_id', 'title']));

        $topic->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nav = Topics::query()->findOrFail($id);

        $nav->delete();

        return response()->json(['status' => true, 'message' => '数据删除成功']);
    }
}
