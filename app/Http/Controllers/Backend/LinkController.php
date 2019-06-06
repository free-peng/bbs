<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\LinkRequest;
use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $links = Link::query()
            ->when($request->filled('name'), function($query) use($request) {
                return $query->where('name', 'like', '%'.$request->name.'%');
            })
            ->orderBy('sequence')
            ->paginate();

        return view('backend.link.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.link.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkRequest $request)
    {
        $data['user_id'] = Auth::user()->id;

        Link::create(array_merge($request->all(), $data));

        return redirect()->back();
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
        $link = Link::query()->findOrFail($id);

        return view('backend.link.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LinkRequest $request, $id)
    {
        $link = Link::query()->findOrFail($id);

        $link->fill($request->only(['name','url','sequence','status']));

        $link->save();

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
        $nav = Link::query()->findOrFail($id);

        $nav->delete();

        return response()->json(['status' => true, 'message' => '数据删除成功']);
    }
}
