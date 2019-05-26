<?php

namespace App\Http\Controllers\Backend;

use App\Models\NavBackend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavController extends Controller
{
    public function index()
    {
        $navs = NavBackend::all();

//        dump($navs);
        return view('backend.nav', compact('navs', 'navs'));
    }

    public function create()
    {
        return view('backend.nav.create');
    }

    public function store(Request $request)
    {
        //需要验证数据

//        dump($request->all());
        $navBackend = new NavBackend;

        $navBackend->name = $request->name;
        $navBackend->url = $request->url;
        $navBackend->sequence = $request->sequence;
        $navBackend->save();


        return redirect('backend/nav');
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
        $delete = NavBackend::destroy($id);
        return redirect('backend/nav');
    }
}
