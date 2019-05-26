<?php

namespace App\Http\Controllers\Backend;

use App\Models\NavBackend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavController extends Controller
{
    public function index()
    {
        $navs = NavBackend::all();

//        dump($navs);
        return view('backend.nav', compact('navs', 'navs'));
    }
}
