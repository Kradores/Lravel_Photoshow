<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.3/css/foundation.css">
    <style>
        .row{
            margin-left: 5%;
            margin-right: 5%;
        }
    </style>
    <title>Photo Show</title>
</head>
<body>
    @include('inc.topbar')
    <div class="row">
        @include('inc.messages')
        @yield('content')
    </div>
</body>
</html>
