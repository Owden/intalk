@extends('app')

@section('title', "#$customer->id $customer->name")

@section('sidebar')
    @parent
@endsection

@section('content')

    <form method="POST" action="">
        @csrf
    <h1>#{{ $customer->id }}</h1>
        <input name="name" type="text" value="{{ $customer->name }}">
    <table border="1">
        <tr>
            <td>Cím:</td><td><input name="address" type=text" value="{{ $customer->address }}"></td>
        </tr>
        <tr>
            <td>E-mail cím:</td><td><input name="email_address" type=text" value="{{ $customer->email_address }}"></td>
        </tr>
        <tr>
            <td>Telefonszám:</td><td><input name="phone_number" type=text" value="{{ $customer->phone_number }}"></td>
        </tr>
    </table>
    <br>

    <input type="submit" value="Módosítás">

    </form>
@endsection
