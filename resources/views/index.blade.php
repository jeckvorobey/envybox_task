<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback form</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body>
    <div id="app">
        {{-- <feedback-form></feedback-form> --}}
        <router-view></router-view>
    </div>

    <script src="/js/app.js"></script>
</body>

</html>
