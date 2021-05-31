@extends('app')

@section('title', "vevők")

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>Vevők</h1>
    <a href="{{url("vevok/hozzaadas")}}">Hozzáadás</a>
    @foreach($customers as $customer)
        <table border="1">
            <tr>
                <td colspan="2"><a href="{{url("vevok/$customer->id")}}">#{{ $customer->id }}</a> {{ $customer->name }} </td>
            </tr>
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
    @endforeach
@endsection
