<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>AkankshAI</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Roboto&family=Tenali+Ramakrishna&display=swap');
        body{
        
        }
        .navbar {
            padding-top: 1%;
            margin-left: 2.5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            margin-left: 0.5%;
        }

        .nav-links {
            display: flex;
            margin-right: 3.5%;
        }

        .navbar a {
            margin-left: 20px;
            color: #407bff;
            font-size: 95%;
            text-decoration: none;
        }

        .question {
            text-align: center;
            padding: 2%;
            font-family: 'Poppins', sans-serif;
            font-family: 'Roboto', sans-serif;
        }

        .question p {
            font-size: 30px;
            font-style: initial;
            font-family: 'Poppins', sans-serif;
            font-family: 'Roboto', sans-serif;
        }

        .options {
            font-family: 'Poppins', sans-serif;
            font-family: 'Roboto', sans-serif;
        }

        .options label {
            display: block;
            margin-bottom: 10px;
        }

        .options input {
            margin-right: 5px;
        }

        .submit button {
            margin-top: 3%;
            background-color: #407BFF;
            width: 15%;
            color: #FFFFFF;
            padding: 1%;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            font-family: 'Roboto', sans-serif;
        }

        .submit button:hover {
            background-color: #305AA8;
        }

        .image {
            text-align: end;
            margin-top: -15%;
        }
        
    </style>
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <img src="../assets/logo.svg" />
        </div>
        <div class="nav-links">
            <a href="{{ url('/dashboard') }}" class="">Home</a>{{--student dashboard page--}}
            <a href="{{ url('/') }}" class="">About Us</a> {{--meet page--}}
            <a href="{{ url('/') }}" class="">Take Test</a> {{--quiz page--}}
        </div>
    </div>
    <div class="quiz-container">
        <div class="question">
            <form action="{{ route('quiz.submit') }}" method="post" id="quizForm">
                @csrf
                @foreach($questions as $key => $question)
                    <div class="question" id="question{{ $key }}" style="{{ $key > 0 ? 'display: none;' : '' }}">
                        <p>{{ $question->question }}</p>
                        <div class=options>
                            @foreach(json_decode($question->options) as $optionKey => $option)
                                <label>
                                    <input type="button" name="q{{ $key }}" value="{{ $optionKey }}">
                                    {{ $option }}
                                </label>
                            @endforeach
                        </div>
                        <!-- Hidden input field to store the current question number -->
                        <input type="hidden" name="current_question" value="{{ $key }}">
                    </div>
                @endforeach
                <div class="submit">
                    <button type="button" onclick="nextQuestion()">Continue</button>
                </div>
            </form>
        </div>
        <div class="image">
            <img src="../assets/Character_1.svg">
        </div>
    </div>

    <script>
        let currentQuestion = 0;
        
        function nextQuestion() {
            const currentQuestionDiv = document.getElementById(`question${currentQuestion}`);
            
            // Save the selected option for the current question
            const selectedOption = document.querySelector(`input[name="answers[${currentQuestion}]"]:checked`);
            if (selectedOption) {
                // Add the selected option to the form data
                const formData = new FormData(document.getElementById('quizForm'));
                formData.append(`answers[${currentQuestion}]`, selectedOption.value);
                
                // Update the form data
                fetch("{{ route('quiz.submit') }}", {
                    method: 'POST',
                    body: formData
                });
            }
            
            currentQuestionDiv.style.display = 'none';
            
            currentQuestion++;
            if (currentQuestion < {{ count($questions) }}) {
                const nextQuestionDiv = document.getElementById(`question${currentQuestion}`);
                nextQuestionDiv.style.display = 'block';
            } else {
                document.getElementById('quizForm').submit();
            }
        }
    </script>
</body>

</html>
