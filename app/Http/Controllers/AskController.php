<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Ask;
use Illuminate\Http\Request;

class AskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Ask::latest()->paginate(10);
        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ask  $Ask
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Ask::find($id);
        if($question){
            return view('admin.questions.show', compact('question'));
        }
        else{
            Session::flash('error', 'Question asked not found!');
            return redirect()->route('dashboard');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ask  $Ask
     * @return \Illuminate\Http\Response
     */
    public function edit(Ask $Ask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ask  $Ask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ask $Ask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ask  $Ask
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ask $question)
    {
        if($question){
            $question->delete();
            Session::flash('success', 'Question deleted successfully!');
        }

        return redirect()->back();
    }
}
