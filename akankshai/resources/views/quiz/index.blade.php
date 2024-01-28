<!-- resources/views/quiz/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
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
