<?php



namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    public function run()
    {
        
        Quiz::truncate();

        
        $quizzes = [
            [
                'question' => 'What is your favourite school subject?',
                'options' => json_encode(['Science', 'Humanities', 'Mathematics', 'Technology','Physical Education']),
                
            ],
            [
                'question' => 'What is your favourite school subject?',
                'options' => json_encode(['Science', 'Humanities', 'Mathematics', 'Technology','Physical Education']),
                
            ],
            [
                'question' => 'What is your favourite school subject?',
                'options' => json_encode(['Science', 'Humanities', 'Mathematics', 'Technology','Physical Education']),
                
            ],
            [
                'question' => 'What is your favourite school subject?',
                'options' => json_encode(['Science', 'Humanities', 'Mathematics', 'Technology','Physical Education']),
                
            ],
            [
                'question' => 'What is your favourite school subject?',
                'options' => json_encode(['Science', 'Humanities', 'Mathematics', 'Technology','Physical Education']),
                
            ]
            
            
        ];

       
        Quiz::insert($quizzes);
    }
}
