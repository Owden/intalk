@extends('app')

@section('title', "#$good->id $good->name")

@section('sidebar')
    @parent
@endsection

@section('content')

    <form method="POST" action="">
        @csrf
    <h1>#{{ $good->id }}</h1>
        <input name="name" type="text" value="{{ $good->name }}">
    <table border="1">
        <tr>
            <td>Ár:</td><td><input name="price" type="number" min="0" value="{{ $good->price }}"></td>
        </tr>
        <tr>
            <td>Készleten lévő mennyiség:</td><td><input name="amount" type="number" min="0" value="{{ $good->amount }}"></td>
        </tr>
    </table>
    <br>

    <input type="submit" value="Módosítás">

    </form>
@endsection
