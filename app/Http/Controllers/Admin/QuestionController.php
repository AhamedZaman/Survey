<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;
use App\Category;
use App\Answer;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Category::all();
        $questions = Question::with('categories')->get();
        return view('admin.pages.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $answers = Answer::all();
        return view('admin.pages.question.create', compact('categories', 'answers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Question();
        $store ->question = $request->question;
        $store ->is_optional = $request->is_optional;
        $store ->status = $request ->status;
        $store ->priority = $request ->priority;
        $store ->category_id = $request ->category;

        $store ->save();

        if($request->answer)
        {
            foreach($request->answer as $answer){
                $store->answers()->attach($answer);
            }
        }
        return redirect()->route('question.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        // dd($question);
        $categories = Category::all();
        $answers = Answer::all();

        return view('admin.pages.question.edit', compact('question', 'categories', 'answers'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question ->question = $request->question;
        $question ->is_optional = $request->is_optional;
        $question ->status = $request ->status;
        $question ->priority = $request ->priority;
        $question ->category_id = $request ->category;

        // dd($question);
        $question ->save();
        if($request->answer)
        {
            foreach($request->answer as $answer){
                $question->answers()->attach($answer);
            }
        }
        return redirect()->route('question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
