<!-- resources/views/quiz/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #007BFF;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        div {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            margin-right: 8px;
        }

        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h1>Quiz Page</h1>

    <form action="{{ route('quiz.store') }}" method="post">
        @csrf

        @foreach($quizzes as $quiz)
            <div>
                <p>{{ $quiz->question }}</p>
                @foreach(json_decode($quiz->options) as $index => $option)
                    <label>
                        <input type="radio" name="responses[{{ $quiz->id }}]" value="{{ $index / 4 }}">
                        {{ $option }}
                    </label>
                @endforeach
            </div>
        @endforeach

        <button type="submit">Submit</button>
    </form>

</body>
</html>
