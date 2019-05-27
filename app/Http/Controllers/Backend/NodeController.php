<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\NodeRequset;
use App\Models\Node;
use App\Models\NodeGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class NodeController extends Controller
{
    /**
     * Display a listing of the resource. 查询数据列表
     *
     *@param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $nodes = Node::query()
//            ->where($request->filled('name'), function ($query) use ($request) {
//                return $query->where("name",$request->name);
//            })
//            ->orderBy('sequence')
//            ->paginate();

        $query = Node::query();
        if ($request->filled("name")) {
            $query->where("name", $request->name);
        }
        $nodes = $query->orderBy("sequence")->paginate(5);

        return view('backend.node.index',compact('nodes'));
    }

    /**
     * Show the form for creating a new resource. 创建页
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = NodeGroup::all();

        return view('backend.node.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage. 数据保存
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NodeRequset $request)
    {
        Node::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource. 显示详细
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource. 编辑页
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nodes = Node::find($id);
        $groups = NodeGroup::all();

        return view('backend.node.edit', compact('id', 'nodes','groups'));
    }

    /**
     * Update the specified resource in storage. 修改数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NodeRequset $request, $id)
    {
        $node = Node::find($id);

        $node->name = $request->name;
        $node->group_id = $request->group_id;
        $node->alias = $request->alias;
        $node->sequence = $request->sequence;

        $node->save();

        return redirect(route('node.index'));

    }

    /**
     * Remove the specified resource from storage. 删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
