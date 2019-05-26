<?php

namespace App\Http\Controllers\Backend;

use App\Models\Nav;
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

    public function create()
    {
        return view('backend.nav.create');
    }

    public function store(Request $request)
    {
        $rules = [
            "name"  => 'required',
            "url"   => 'required|url',
            "sequence" => "numeric"
        ];

        $message = [
            "name.required" => '导航必须填写'
        ];

        $request->validate($rules, $message);

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
        //
    }

    /**
     * Update the specified resource in storage. 修改数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage. 删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nav::destroy($id);

        return redirect()->back();
    }
}
