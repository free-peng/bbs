<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\Home\ReleaseRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\NodeGroup;
use App\Models\Topics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReleaseController extends Controller
{
    public function index()
    {
        $nodeGroups = NodeGroup::all();

        return view('home.release.index',compact('nodeGroups'));
    }

    public function save(ReleaseRequest $request)
    {
        $data['user_id'] = Auth::id();
        $data['active_time'] = date('Y-m-d h:i:s', time());

        $topic = new Topics;
        $topic->fill(array_merge($request->only('title','node_id','content'), $data));

        $topic->content = clean($topic->content, 'user_topic_body');
        $topic->title = clean($topic->title, 'user_topic_body');

        $topic->save();

        return redirect()->back();
    }
}
