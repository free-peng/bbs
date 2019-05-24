<?php

namespace App\Http\Controllers\Home;

use App\Models\NodeGroup;
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

        return view("home.node", compact("nodeGroups", "nodes"));
    }
}
