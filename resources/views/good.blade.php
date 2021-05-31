@extends('app')

@section('title', "#$good->id $good->name")

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>#{{ $good->id }} {{ $good->name }}</h1>
    <table border="1">
        <tr>
            <td>Ár:</td><td>{{ $good->price }}</td>
        </tr>
        <tr>
            <td>Készleten lévő mennyiség:</td><td>{{ $good->amount }}</td>
        </tr>
    </table>
    <br>
    <a href="{{url("termekek/$good->id/modositas")}}">Módosítás</a>
    <form method="POST" action="{{url("termekek/$good->id/termektorlese")}}">
        @method('DELETE')
        @csrf
        <input type="submit" value="Törlés">
    </form>
@endsection
