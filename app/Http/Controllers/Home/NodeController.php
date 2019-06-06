<?php

namespace App\Http\Controllers\Home;

use App\Models\NodeGroup;
use App\Models\Topics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NodeController extends Controller
{
    /**
     * 节点列表
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $nodeGroups = NodeGroup::all();

        return view("home.node.index", compact("nodeGroups", "nodes"));
    }

    /**
     * 点击节点获取相关话题
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function nodeTopic(Request $request)
    {
        $nodeTopics = Topics::query()
            ->where('node_id', $request->node_id)
            ->paginate();

        return view('home.node.node_topic', compact('nodeTopics'));
    }
}
