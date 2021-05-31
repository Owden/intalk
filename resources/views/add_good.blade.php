@extends('app')

@section('title', "Termék hozzáadása")

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>Termék hozzáadása</h1>
    <a href="{{url("termekek/")}}">Mégse</a>
    <br>
    <form method="POST" action="">
        @csrf
        <input name="name" type="text" placeholder="Termék név">
        <table border="1">
            <tr>
                <td>Ár:</td><td><input name="price" type="number" min="0"></td>
            </tr>
            <tr>
                <td>Készleten lévő mennyiség:</td><td><input name="amount" type="number" min="0"></td>
            </tr>
        </table>
        <br>

        <input type="submit" value="Hozzáadás">

    </form>
@endsection
