@extends('app')

@section('title', "#{{ $supplier->id }} {{ $supplier->company_name }}")

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>#{{ $supplier->id }} {{ $supplier->company_name }}</h1>
    <table border="1">
        <tr>
            <td colspan="2">{{ $supplier->contact }}</td>
        </tr>
        <tr>
            <td>Cím:</td><td>{{ $supplier->address }}</td>
        </tr>
        <tr>
            <td>E-mail:</td><td>{{ $supplier->email_address }}</td>
        </tr>
        <tr>
            <td>Telefon szám:</td><td>{{ $supplier->phone_number }}</td>
        </tr>
    </table>
    <br>
    <a href="{{url("beszallitok/$supplier->id/modositas")}}">Módosítás</a>
    <form method="POST" action="{{url("beszallitok/$supplier->id/beszallitotorlese")}}">
        @method('DELETE')
        @csrf
        <input type="submit" value="Törlés">
    </form>
@endsection
