@extends('app')

@section('title', "#{{ $customer->id }} {{ $customer->name }}")

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>#{{ $customer->id }} {{ $customer->name }}</h1>
    <table border="1">
        <tr>
            <td>Cím:</td><td>{{ $customer->address }}</td>
        </tr>
        <tr>
            <td>E-mail:</td><td>{{ $customer->email_address }}</td>
        </tr>
        <tr>
            <td>Telefon szám:</td><td>{{ $customer->phone_number }}</td>
        </tr>
    </table>
    <br>
    <a href="{{url("vevok/$customer->id/modositas")}}">Módosítás</a>
    <form method="POST" action="{{url("vevok/$customer->id/vevotorlese")}}">
        @method('DELETE')
        @csrf
        <input type="submit" value="Törlés">
    </form>
@endsection
