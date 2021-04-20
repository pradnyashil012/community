<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search;
use App\Models\Post;
use Session;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $searches = DB::table('searches')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.searches.index', compact('searches'));
      
    }

    public function destroy($id)
    {
            search::find($id)->delete();
            Session::flash('success', 'Search deleted successfully!');
       
        return redirect()->back();
    }

}
