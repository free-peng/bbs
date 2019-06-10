<?php

namespace App\Http\View\Composers;

use Illuminate\Support\Facades\Request;
use Illuminate\View\View;

class InfoComposer
{
    public function compose(View $view)
    {
        $view->with("nav", Request::has('id') ? '他' : '我');
    }
}