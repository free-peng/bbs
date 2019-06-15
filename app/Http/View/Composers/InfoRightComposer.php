<?php

namespace App\Http\View\Composers;

use App\Models\Attention;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class InfoRightComposer
{
    public function compose(View $view)
    {
        $view->with('user', User::query()->findOrFail(request('id')));
        $view->with('isAttention', Attention::query()->where(['user_id'=> Auth::id(), 'attention_user_id' => request('id')])->count());
        $view->with("id", request('id'));
    }
}