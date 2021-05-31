<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BK946D - @yield('title')</title>
</head>
<body>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('sidebar')
    <a href="{{url("vevok/")}}">Vevők</a>
    <a href="{{url("termekek/")}}">Terméklista</a>
    <a href="{{url("szolgaltatasok/")}}">Szolgáltatások listája</a>
    <a href="{{url("beszallitok/")}}">Beszállítók listája</a>
    <a href="{{url("szamlak/")}}">Számlalista</a>

@show

<div class="container">
    @yield('content')
</div>
</body>
</html>
