<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Models\Ask;
use App\Models\Search;
use DB;
use Session;
use Illuminate\Support\Str;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function help()
    {
        $posts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->take(5)->get();
        $postsFirst2 = $posts->splice(0, 2);
        $middlePost = $posts->splice(0, 1);
        $lastPost = $posts->splice(0);

        $footerPost = Post::with('category', 'user')->inRandomOrder()->limit(4)->get();;
        $firstfooterPost = $footerPost->splice(0, 1);
        $firstfooterPost2 = $footerPost->splice(0, 2);
        $lastFooterPost = $footerPost->splice(0, 1);

        $recentPosts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->paginate(9);
        return view('website.home', compact(['posts', 'recentPosts', 'footerPost', 'postsFirst2', 'middlePost', 
        'lastPost', 'firstfooterPost2', 
        'firstfooterPost', 'lastFooterPost']));
    }

    public function community()
    {
        $recentQues = Ask::orderBy('created_at', 'DESC')->paginate(9);
        return view('website.community', compact(['recentQues']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if($category)
        {
            $posts = Post::where('category_id', $category->id)->paginate(9);
            return view('website.category', compact('category', 'posts'));
        }
        else
        {
            return redirect()->route('website');
        }
        
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        if($tag)
        {
            $posts = $tag->posts()->orderBy('created_at', 'desc')->paginate(9);
            return view('website.tag', compact('tag', 'posts'));
        }
        else
        {
            return redirect()->route('website');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function post($slug)
    {
        $relatedPost = Post::orderBy('category_id', 'desc')->inRandomOrder()->take(4)->get();;
        $firstrelatedPost = $relatedPost->splice(0, 1);
        $firstrelatedPost2 = $relatedPost->splice(0, 2);
        $lastrelatedPost = $relatedPost->splice(0, 1);

        $post = Post::with('category', 'user')->where('slug', $slug)->first();
        $posts = Post::with('category', 'user')->inRandomOrder()->limit(3)->get();
        $categories = Category::all();
        $tags = Tag::all();
        if($post){
            return view('website.post', compact('post', 'posts', 'categories', 'tags', 
            'firstrelatedPost', 'firstrelatedPost2', 'lastrelatedPost', 'relatedPost'));
        }
        else{
            return('/');
        }
        
    }

    public function question($slug)
    {


        $que = Ask::where('slug', $slug)->first();
        if($que){
            return view('website.question', compact('que'));
        }
        else{
            return('/');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
   
    public function about()
    {
        $user = User::first();
        return view('website.about', compact('user'));
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function send_message(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required|max:200',
            'subject' =>'required|max:255',
            'message' => 'required|min:100'
        ]);

        $contact = Contact::create($request->all());
        
        Session::flash('message-send', 'Message sent successfully!');
        return redirect()->back();
    }

    public function ask()
    {
        return view('website.ask');
    }

    public function ask_question(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required|max:200',
            'question' =>'required|max:255',
            'description' => 'required|min:100'
        ]);

        $question = Ask::create([
            'name' => $request->name,
            'email' => $request->email,
            'question' => $request->question,
            'slug' => Str::slug($request->question),
            'description' => $request->description,
        ]);

        $question->save();
        
        Session::flash('question-asked', 'Question asked successfully!');
        return redirect()->back();
    }

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(cr $cr)
    {
        //
    }

}
