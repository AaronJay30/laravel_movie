<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('css/boxicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/card.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('img/RottenPopCorn(LogoOnly).png')}}">
    <script src="{{asset('js/jquery.3.7.1.js')}}"></script>
    <script src="{{asset('js/sweetalert.js')}}"></script>
    <script src="{{asset('js/flowbite.js')}}"></script>

    <title>{{$title}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<x-messages/>