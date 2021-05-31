@extends('app')

@section('title', "#$supplier->id $supplier->company_name")

@section('sidebar')
    @parent
@endsection

@section('content')

    <form method="POST" action="">
        @csrf
    <h1>#{{ $supplier->id }}</h1>
        <input name="company_name" type="text" value="{{ $supplier->company_name }}">
    <table border="1">
        <tr>
            <td>Kapcsolattartó:</td><td><input name="contact" type=text" value="{{ $supplier->contact }}"></td>
        </tr>
        <tr>
            <td>Cím:</td><td><input name="address" type=text" value="{{ $supplier->address }}"></td>
        </tr>
        <tr>
            <td>E-mail cím:</td><td><input name="email_address" type=text" value="{{ $supplier->email_address }}"></td>
        </tr>
        <tr>
            <td>Telefonszám:</td><td><input name="phone_number" type=text" value="{{ $supplier->phone_number }}"></td>
        </tr>
    </table>
    <br>

    <input type="submit" value="Módosítás">

    </form>
@endsection
