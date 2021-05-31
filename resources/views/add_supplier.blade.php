@extends('app')

@section('title', "Beszállító hozzáadása")

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>Beszállító hozzáadása</h1>
    <a href="{{url("beszallito/")}}">Mégse</a>
    <br>
    <form method="POST" action="">
        @csrf
        <input name="company_name" type="text" placeholder="Beszállító neve">
        <table border="1">
            <tr>
                <td>Kapcsolattartó:</td><td><input name="contact" type=text"></td>
            </tr>
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
