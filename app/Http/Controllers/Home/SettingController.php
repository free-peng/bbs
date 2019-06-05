<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\Home\PasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * 用户个人中心
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('home.setting.index');
    }

    /**
     * 设置密码
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function password()
    {
        return view('home.setting.password');
    }

    public function passwordUpdate(PasswordRequest $request)
    {
         $user = User::query()->findOrFail(Auth::user()->id);

//        if (Hash::make($request->old_password) !== $user->password) {
//            return '错误';
//        }
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back();
    }

    /**
     * 设置头像
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function avatar()
    {
        $avatar = Auth::user()->avatar;

        return view('home.setting.avatar', compact('avatar'));
    }

    /**
     * 头像上传
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function avatarUpload(Request $request)
    {
        if (! $request->hasFile("avatar")) {
            return redirect()->back()->withErrors("请选择需要上传的头像");
        }

        if (! $request->file('avatar')->isValid()) {
            return redirect()->back()->withErrors("文件上传失败");
        }

        if (! in_array($request->avatar->extension(), ["png", "jpg", "jpeg", "gif"])) {
            return redirect()->back()->withErrors("请选择合法的文件");
        }

        $dir = "avatars/". date("Ymd", time());
        $path = $request->avatar->store($dir);

        $user = Auth::user();
        $user->avatar = Storage::url($path);
        $user->save();

        return redirect()->back();
    }

    /**
     * 发布的文章
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function release()
    {
        return view('home.setting.release');
    }

    /**
     * 点赞的文章
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function like()
    {
        return view('home.setting.like');
    }
}
