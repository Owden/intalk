@extends('app')

@section('title', "Terméklista")

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>Termékek</h1>
    <a href="{{url("termekek/hozzaadas")}}">Hozzáadás</a>
    @foreach($goods as $good)
        <table border="1">
            <tr>
                <td colspan="2"><a href="{{url("termekek/$good->id")}}">#{{ $good->id }}</a> {{ $good->name }}</td>
            </tr>
            <tr>
                <td>Ár:</td><td>{{ $good->price }}</td>
            </tr>
            <tr>
                <td>Készleten lévő mennyiség:</td><td>{{ $good->amount }}</td>
            </tr>
        </table>
        <br>
    @endforeach
@endsection
