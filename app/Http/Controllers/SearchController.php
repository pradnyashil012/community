<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search;
use App\Models\Post;
use Session;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $this->validate($request, [
            'search_query' => 'required|max:200'
        ]);

        $search_query = $request->search_query;
        
        $searches = SEARCH::create($request->all());
        $searches->save();

        $posts = Post::where('title','LIKE','%'.$search_query.'%')->paginate(6);
        
        Session::put('search_item', $search_query);
        return view('website.search', compact('posts'));

      
    }

}
