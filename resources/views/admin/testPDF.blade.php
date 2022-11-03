<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laravel 9 Generate PDF From View</title>
    <style>
        @font-face {
                font-family: arial;
                font-weight: normal;
                src: url("{{base_path()}}/storage/fonts/arial.ttf") format("truetype")
            }
            body{
                font-family: arial,sans-serif;
            }
    </style>

</head>
<body>
    {{-- {{dd(base_path()."/storage")}} --}}
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Հայերեն
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</body>
</html>
