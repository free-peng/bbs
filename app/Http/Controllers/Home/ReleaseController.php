<?php

namespace App\Http\Controllers\Home;

use App\Models\Node;
use App\Models\NodeGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReleaseController extends Controller
{
    public function index()
    {
        $nodeGroups = NodeGroup::all();
//        dump($nodeGroups);
        return view('home.release.index',compact('nodeGroups'));
    }
}
