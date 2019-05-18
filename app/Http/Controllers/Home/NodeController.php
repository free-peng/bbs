<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NodeController extends Controller
{
    public function index(Request $request)
    {
        return 'node';
    }
}
