<?php



namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    public function run()
    {
        
       

        
        $quizzes = [
            [
                'question' => 'What is your favourite school subject?',
                'options' => json_encode(['Science', 'Humanities', 'Mathematics', 'Technology','Physical Education']),
            ],
            [
                'question' => 'Are you involved in any school clubs or organisations?',
                'options' => json_encode(['Yes, academic clubs', 'Yes, sports clubs', 'Yes, arts and creative clubs', 'No, I prefer individual activities','No, Im not involved in extracurricular activities']),
            ],
            [
                'question' => 'Have you thought about what you might want to study in college or pursue as a career??',
                'options' => json_encode(['Yes, a science-related field', 'Yes, a humanities-related field', 'Yes, a business-related fieldatics', 'No, I havent decided yet',"No, I don't plan to go to college"]),
            ],
            [
                'question' => 'How comfortable are you with using technology and various software applications?',
                'options' => json_encode(['Very comfortable', 'Somewhat comfortable', 'Neutral', 'Not very comfortable','Not comfortable at all']),
            ],
            [
                'question' => 'What type of books do you enjoy reading the most?',
                'options' => json_encode(['Fiction', 'Non-fiction', 'Mystery/Thriller', 'Science fiction',"I don't enjoy reading books'"]),

            ],
            [
                'question' => 'Do you enjoy solving puzzles or brain teasers?',
                'options' => json_encode(['Yes, I love them', "Sometimes, if they're not too challenging", 'Not really, I find them frustrating', 'No, I prefer straightforward tasks',"I've never tried solving puzzles"]),
            ],
            [
                'question' => 'Have you ever come up with a business idea or participated in any entrepreneurial activities?',
                'options' => json_encode(['Yes, and I enjoyed it', "Yes, but I didn't enjoy it", "No, but I'm interested in trying", "No, and I'm not interested","I haven't thought about it"]),
            ],
            [
                'question' => 'Are you actively involved in any community service or volunteer work?',
                'options' => json_encode(["Yes, regularly", "Occasionally", "Rarely", "No, but I'm interested","No, I'm not interested"]),
            ],
            [
                'question' => 'Are there specific goals you have set for yourself in the next few years?',
                'options' => json_encode(["Yes, academic goals", "Yes, personal development goals", "Yes, career-related goals", "No, I prefer to go with the flow","No, I haven't thought about it"]),
            ],
            [
                'question' => 'Do you prefer hands-on learning experiences or theoretical concepts?',
                'options' => json_encode(["Hands-on", "Theoretical", "Both, depending on the subject", "I'm not sure","I don't have a preference"]),
            ],
            [
                'question' => 'Are you interested in health and wellness activities, such as fitness or mindfulness practices?',
                'options' => json_encode(["Yes, very interested", "Somewhat interested", "Neutral", "Not very interested","Not interested at all"]),
            ],
            [
                'question' => 'Do you enjoy expressing yourself through art, writing, or other creative outlets?',
                'options' => json_encode(["Yes, I love it", "Sometimes, when I'm in the mood", "Not really, but I appreciate it in others", "No, I'm not creative","I've never tried"]),
            ],
            [
                'question' => 'Are you curious about scientific discoveries and technological advancements?',
                'options' => json_encode(["Yes, very curious", "Somewhat curious", "Neutral", "Not very curious","Not curious at all"]),
            ],
            [
                'question' => 'Have you held leadership roles in school or community activities?',
                'options' => json_encode(["Yes, multiple times", "Yes, but only once", "No, but I enjoy working in a team", "No, I prefer working independently","No, I haven't had the opportunity"]),
            ],
            [
                'question' => 'Are you passionate about environmental issues or sustainability?',
                'options' => json_encode(["Yes, very passionate", "Somewhat passionate", "Neutral", "Not very passionate","Not passionate at all"]),
            ],
            [
                'question' => 'Are there specific skills or knowledge areas you would like to learn more about?',
                'options' => json_encode(["Yes, technical skills", "Yes, creative skills", "Yes, business-related skills", "No, I'm content with what I know","No, I haven't thought about it"]),
            ],
            [
                'question' => 'How do you feel about emerging technologies, such as artificial intelligence or virtual reality?',
                'options' => json_encode(["Excited about it", "Neutral", "Skeptical", "Not interested","I haven't thought about it"]),
            ],
            [
                'question' => 'Do you have an interest in learning about different cultures and global perspectives?',
                'options' => json_encode(["Yes, very interested", "Somewhat interested", "Neutral", "Not very interested","Not interested at all"]),
            ],
            [
                'question' => 'What motivates you to succeed, both academically and personally?',
                'options' => json_encode(["Intrinsic motivation (personal satisfaction)", "Extrinsic motivation (recognition from others)", "Both", "I'm not sure","I'm not sure"]),
            ],
            [
                'question' => 'How would you describe your strengths and areas for improvement?',
                'options' => json_encode(["Self-aware and reflective", "Somewhat self-aware", "Not very self-aware", "I don't know","I haven't thought about it"]),
            ],
            
            ## Engineering specific questions

            [
                'question' => "What aspect of troubleshooting do you find most challenging and rewarding?",
                'options' => json_encode(["Identifying and fixing software bugs","Debugging electronic circuits","Diagnosing and resolving mechanical failures","Analyzing and solving construction-related issues","Other"]),
            ],
            [
                'question' => "In the context of engineering, which of the following topics is most closely associated with your expertise?",
                'options' => json_encode(["Algorithms and Data Structures","Signal Processing and Communication","Structural Analysis and Design","Thermodynamics and Fluid Mechanics","Other"]),
            ],
            [
                'question' => "If you were given a challenging problem to solve, which aspect would excite you the most?",
                'options' => json_encode(["Analyzing and developing efficient algorithms","Designing and optimizing electronic circuits","Investigating the properties of materials and their applications","Solving complex mathematical equations related to physical phenomena","Other"]),
            ],
            [
                'question' => "When considering a problem, what kind of solution do you find most appealing?",
                'options' => json_encode(["Developing algorithms and coding solutions","Creating hardware devices and gadgets","Analyzing and designing mechanical systems","Planning and designing structures for stability","Other"]),
            ],
            [
                'question' => "When thinking about your ideal project, what role would you prefer to take?",
                'options' => json_encode(["Software Developer or Programmer","Hardware Engineer or Embedded Systems Developer","Mechanical Design Engineer","Structural Engineer or Project Manager","Other"]),
            ],
            [
                'question' => "What is your preferred way of learning and acquiring new skills?",
                'options' => json_encode(["Online coding platforms and tutorials","Electronics and DIY project videos","Hands-on mechanical workshops and courses","Architectural and structural design courses","Other"]),
            ],
            [
                'question' => "What area of technology do you think will have the most significant societal impact in the next decade?",
                'options' => json_encode(["Artificial Intelligence and Machine Learning","Internet of Things (IoT)","Advanced manufacturing and 3D printing","Sustainable and eco-friendly construction methods","Other"]),
            ],
            [
                'question' => "In a team project, what role would you prefer to take on?  ",
                'options' => json_encode(["Lead programmer or software architect","Hardware specialist or circuit designer","Mechanical design lead","Project manager or coordinator","Other"]),
            ],
            [
                'question' => "Reflecting on your strengths, which skill do you feel most confident in?",
                'options' => json_encode(["Analytical and logical reasoning","Scientific research and experimentation","Creativity and design thinking","Problem-solving and decision-making","Other"]),
            ],
            [
                'question' => "When thinking about the future, which area do you believe will have the most significant impact?",
                'options' => json_encode(["Information technology and digital transformation","Advancements in scientific research and discovery","Infrastructure development and urban planning","Innovation in manufacturing and industry","Other"]),
            ],
            [
                'question' => "When exploring technology trends, what topics catch your attention?",
                'options' => json_encode(["Cybersecurity and Data Privacy","5G and Communication Networks","Renewable Energy and Sustainability","Urban Planning and Smart Cities","Other"]),
            ],
            [
                'question' => "In the context of robotics, what does PID control stand for?",
                'options' => json_encode(["Pressure, Inertia, and Density","Proportional, Integral, and Derivative","Power, Impedance, and Direction","Don't know","Other"]),
            ],
            [
                'question' => "What type of technology trends do you actively follow or research?",
                'options' => json_encode(["Software development frameworks","Emerging electronic devices","Advanced manufacturing technologies","Innovations in construction materials","Other"]),
            ],
            [
                'question' => "What is your family income?",
                'options' => json_encode(["Below 1LPA","Below 5 LPA","Below 8 LPA","Below 12 LPA","Above 12 LPA"]),
            ],

            ## Big-5
            [
                'question' => "Am the life of the party",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Feel little concern for others",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Am always prepared",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Get stressed out easily.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Have a rich vocabulary.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Don't talk a lot.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Am interested in people.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Leave my belongings around.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Am relaxed most of the time.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Have difficulty understanding abstract ideas.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Feel comfortable around people.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Insult people.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Pay attention to details.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Worry about things.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Have a vivid imagination.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Keep in the background.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Sympathize with others' feelings.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Make a mess of things.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Seldom feel blue.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Am not interested in abstract ideas.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Start conversations.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Am not interested in other people's problems.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Get chores done right away.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Am easily disturbed.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Have excellent ideas.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Have little to say.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Have a soft heart.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Often forget to put things back in their proper place.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Get upset easily",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Do not have a good imagination.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Talk to a lot of different people at parties.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Am not really interested in others.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Like order.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Change my mood a lot.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Am quick to understand things.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => " Don't like to draw attention to myself.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Take time out for others.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Shirk my duties.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Have frequent mood swings.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Use difficult words.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Don't mind being the center of attention.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Feel others' emotions.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Follow a schedule.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Get irritated easily.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Spend time reflecting on things.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Am quiet around strangers.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Make people feel at ease.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Am exacting in my work.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Often feel blue.",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ],
            [
                'question' => "Am full of ideas",
                'option' => json_encode(["disagree","sightly disagree","neutral","slighty agree","agree"]),
            ]
            
            
        ];

       
        Quiz::insert($quizzes);
    }
}
