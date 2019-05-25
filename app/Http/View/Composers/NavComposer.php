<?php

namespace App\Http\View\Composers;


use App\Models\Nav;
use Illuminate\View\View;

class NavComposer
{
    public function compose(View $view)
    {
        $view->with("navItems", Nav::query()->orderBy("sequence")->get());
    }
}