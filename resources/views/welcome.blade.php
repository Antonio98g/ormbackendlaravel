<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1>Laravel Eloquent: Relaciones</h1>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col text-center">
                <ul class="list-inline h4">
                    @foreach ($users as $user)
                        <li class="list-inline-item">
                            <a href="{{ route('profile', $user->id) }}">{{$user->name}}</a>
                            </li>
                    @endforeach

                </ul>

            </div>
        </div>


    </div>

</body>

</html>