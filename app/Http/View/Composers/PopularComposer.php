<?php

namespace App\Http\View\Composers;


use App\Models\Topics;
use Illuminate\View\View;

class PopularComposer
{
    public function compose(View $view)
    {
        $view->with("popularTopics", Topics::query()->orderBy("pv",'desc')->limit(10)->get());
    }
}