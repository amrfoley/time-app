<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Time App</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="container mt-5">
    <h1>Want to know the time?</h1>
    <form action="{{ route('timestamps') }}">
        @csrf
        <div class="input-group mb-3">
            <select class="form-select" id="inputGroupSelect03" name="timezone" aria-label="Example select with button addon">
                <option selected>Choose Timezone...</option>
                @foreach($timezones as $timezone)
                <option value="{{ $timezone->timezone }}">{{ $timezone->name }}</option>
                @endforeach
            </select>
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </form>
    @if(!empty($date))
        <div class="mt-5">
            <p>Time is: </p>
            <h2>{{ $date }}</h2>
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>