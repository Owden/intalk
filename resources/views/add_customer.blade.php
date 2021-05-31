@extends('app')

@section('title', "Vevő hozzáadása")

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>Vevő hozzáadása</h1>
    <a href="{{url("vevo/")}}">Mégse</a>
    <br>
    <form method="POST" action="">
        @csrf
        <input name="name" type="text" placeholder="Vevő neve">
        <table border="1">
            <tr>
                <td>Cím:</td><td><input name="address" type=text"></td>
            </tr>
            <tr>
                <td>E-mail cím:</td><td><input name="email_address" type=text"></td>
            </tr>
            <tr>
                <td>Telefonszám:</td><td><input name="phone_number" type=text"></td>
            </tr>
        </table>
        <br>

        <input type="submit" value="Hozzáadás">

    </form>
@endsection
