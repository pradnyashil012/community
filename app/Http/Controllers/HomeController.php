<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use App\Models\Contact;
use App\Models\Ask;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    

    public function contact()
    {
        return view('website.contact');
    }

    public function ask()
    {
        return view('website.ask');
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

    public function ask_question(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required|max:200',
            'subject' =>'required|max:255',
            'question' => 'required|min:100'
        ]);

        $question = Ask::create($request->all());
        
        Session::flash('question-asked', 'Question asked successfully!');
        return redirect()->back();
    }

}
