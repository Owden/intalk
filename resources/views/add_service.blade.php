@extends('app')

@section('title', "Szolgáltatás hozzáadása")

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>Szolgáltatás hozzáadása</h1>
    <a href="{{url("szolgaltatasok/")}}">Mégse</a>
    <br>
    <form method="POST" action="">
        @csrf
        <input name="name" type="text" placeholder="Szolgáltatás neve">
        <table border="1">
            <tr>
                <td>Ár:</td><td><input name="price" type="number" min="0"></td>
            </tr>
        </table>
        <br>

        <input type="submit" value="Hozzáadás">

    </form>
@endsection
