<?php

namespace App\Http\View\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class InfoLeftComposer
{
    public function compose(View $view)
    {
        $view->with("meOrHe", request('id') == Auth::user()->id ? '我' : 'Ta');
        $view->with("id", request('id'));
    }
}