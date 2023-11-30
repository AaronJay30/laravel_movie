<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/app.css')
    <link rel="stylesheet" href="{{asset('css/boxicgions.min.css')}}">
    <script src="{{asset('js/jquery.3.7.1.js')}}"></script>
    <script src="{{asset('js/sweetalert.js')}}"></script>

    <title>{{$title}}</title>
</head>
<body>