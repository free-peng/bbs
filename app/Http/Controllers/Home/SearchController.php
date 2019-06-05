<?php

namespace App\Http\Controllers\Home;

use App\Models\Topics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $searchItems = Topics::query()
            ->when($request->filled("name"), function($query) use($request) {
                    return $query->where('title', 'like', '%'.$request->name.'%' );
            })
            ->paginate();
        return view('home.search.index', compact('searchItems'));
    }
}
