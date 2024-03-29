<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
//        $users = User::paginate();
        $users = User::query()
            ->when($request->filled('name'), function($query) use($request) {
                return $query->where('name','like', '%'.$request->name.'%');
            })
            ->paginate(10);

        return view('backend.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * @param UserRequest $request
     */
    public function store(UserRequest $request)
    {
        $data = $request->only(['name','email', 'weibo','website','github','sex','is_admin']);
        $data['password'] = Hash::make($request->password);

         User::create($data);

//        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::query()->findOrFail($id);

        return view('backend.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::query()->findOrFail($id);

        dd($request->all());
        $user->fill($request->only(['email', 'website','weibo','github','sex','is_admin']));
        $user->save();

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
        $nav = User::query()->findOrFail($id);

        $nav->delete();

        return response()->json(['status' => true, 'message' => '数据删除成功']);
    }
}
