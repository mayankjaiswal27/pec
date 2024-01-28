<?php

// app/Http/Controllers/QuizController.php

namespace App\Http\Controllers;
use App\Models\UserResponse;
use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();

        return view('quiz.index', compact('quizzes'));
    }

    public function store(Request $request)
    {
        // Assuming you have a 'user_responses' table to store user responses
        // Make sure to create the migration for the 'user_responses' table

        $userResponses = $request->input('responses');

        // Store user responses in the 'user_responses' table
        // You may need to adjust the database structure based on your needs
        // For simplicity, let's assume each response is stored as a new row

        foreach ($userResponses as $questionId => $response) {
            // Assuming 'question_id' and 'response' are columns in the 'user_responses' table
            // You may need to adjust column names based on your actual database structure
            UserResponse::create([
                'question_id' => $questionId,
                'response' => $response,
            ]);
        }

        return redirect()->route('AI Files.index2')->with('success', 'Quiz submitted successfully!');
    }
}

