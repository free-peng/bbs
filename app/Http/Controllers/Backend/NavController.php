<?php

namespace App\Http\Controllers\Backend;

use App\Models\Nav;
use App\Http\Requests\Backend\NavRequest;
use App\Models\Node;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavController extends Controller
{

    /**
     * 导航列表
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $navItems = Nav::query()
            ->when($request->filled("name"), function ($query) use ($request) {
                return $query->where("name", $request->name);
            })
            ->orderBy("sequence")
            ->paginate();

        return view('backend.nav.index', compact("navItems"));
    }

    public function create(Request $request)
    {
        return view('backend.nav.create');
    }

    /**
     * 添加导航数据保存
     * @param NavRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NavRequest $request)
    {
        Nav::create($request->all());

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
        $nav = Nav::query()->findOrFail($id);

        return view('backend.nav.edit',compact('nav'));
    }

    /**
     * Update the specified resource in storage. 修改数据
     *
     * @param  NavRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NavRequest $request, $id)
    {
        $nav = Nav::query()->findOrFail($id);

        $nav->fill($request->only(['name', 'url', 'sequence']));

        $nav->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage. 删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nav = Nav::query()->findOrFail($id);

        $nav->delete();

        return response()->json(['status' => true, 'message' => '数据删除成功']);
    }
}
