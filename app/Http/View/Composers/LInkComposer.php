<?php

namespace App\Http\View\Composers;


use App\Models\Link;
use Illuminate\View\View;

class LInkComposer
{
    public function compose(View $view)
    {
        $view->with("links", Link::query()->orderBy("sequence")->limit(10)->get());
    }
}