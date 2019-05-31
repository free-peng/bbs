<?php

namespace App\Http\Controllers\Home;

use App\Models\Topics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $article = Topics::query()->findOrFail($request->id);
        
        return view('home.details.index',compact('article'));
    }
}
