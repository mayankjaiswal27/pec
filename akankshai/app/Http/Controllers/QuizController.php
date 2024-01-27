<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function index()
    {
        $questions = Quiz::all();
        return view('quiz.index', compact('questions'));
    }

    public function submit(Request $request)
    {
       

        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'q') === 0) {
                $questionId = substr($key, 1);

                $quiz = Quiz::find($questionId);

                $quiz->response = $value;

               
                $quiz->save();
            }
        }

        return redirect()->route('quiz.index');
    }
}