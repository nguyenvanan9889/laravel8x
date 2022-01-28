<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multiple choice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            @csrf
            @foreach ($questions as $k => $question)
                @php
                    $mcQuestion = $question->getQuestion();
                @endphp
                <div class="mc-question-item" style="padding: 10px; background-color: {{$k % 2 != 0 ? '#eee' : '#bbb'}}">
                    {!! $mcQuestion->getLayoutInput() !!}
                </div>
            @endforeach
            <button type="submit" style="margin-top: 30px;">Nộp bài</button>
        </form>
    </div>
</body>
</html>