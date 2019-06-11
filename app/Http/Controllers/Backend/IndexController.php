<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $userCount = User::query()->count();
        return view('backend.index');
    }

    public function lineChart()
    {
        
    }
}
